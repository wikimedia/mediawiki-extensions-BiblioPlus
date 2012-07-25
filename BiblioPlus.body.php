<?php

/*
 * Class that takes PubMed pmids and ISBN numbers and calls the appropriate online service
 * to get the full reference.  The references are then formatted for output in the references section 
 * at the bottom of a page.
 * All code without an author tag in the function documentation was taken from the Biblio extension.
 */
class BiblioPlus {
    /*
     * Constructor. Sets up the Mediawiki hooks.
     * @author Karen Eddy
     */
    function __construct() {
        $this->SetupHooks();
    }

    /*
     * Returns an array element with index $key, or null if it does not exist.
     * @param $array - the array to search
     * @param $key - the index of the desired element
     * @return - the array element, or null if the key does not exist.
     */
    function get($array, $key) {
        if (is_array($array) && array_key_exists($key, $array))
            return $array[$key];
        else
            return NULL;
    }

    /*
     * Removes the brackets from around a link.
     * @param $link - the link to remove the brackets from
     * @return - the link with any brackets removed
     */
    function unbracket($link) {
        $matches = array();
        preg_match('/ \[ ( [^\]]* ) \] /sx', $link, $matches);
        return $matches[1];
    }

    /* Converts a link (http://a.b.c or [internal] or [inter:wiki]) to a URL.
     * @param $link - the link to convert
     * @param $query - an additional CGI parameter, such as "action=raw"
     * @return $link - the link, converted to a URL.
     */
    function make_url($link, $query = '') {
        $m = $this->unbracket($link);
        if (isset($m)) {
            $title = Title::newFromText($m);
            $url = $title -> getFullURL($query);
            return $url;
        } else
            return $link;
    }

    /* Reads text from a URL and returns it as a string
     * @param $url - the URL to call
     * @return $result - the contents of the URL as a string
     */
    function fetch_url($url) {
        $old_url_fopen = ini_set("allow_url_fopen", true);
        $result = @implode('', file($url));
        ini_set("allow_url_fopen", $old_url_fopen);
        return $result;
    }

    /* Returns the source code of a local wiki page
     * @param - $title - the title of the wiki page 
     * @return - the source code of the input page
     */    
    function fetch_page($title) {
        $rev = Revision::newFromTitle($title);
        return $rev -> getText();
    }

    // Management of the citation indices (order in which they appear in the text)
    var $Citations = array();

    /* Returns the number of the reference if already cited, or
     * if $create is true then assign & return a new one, otherwise return -1.
     * @param $key - the index of the citation to return or create
     * @param $create - boolean to indicate whether a new reference number should be created
     * @return - the reference number, or -1 if one was not created.
     */
    function CitationIndex($key, $create = true) {
        if (array_key_exists($key, $this -> Citations)) {
            // ref was already cited
            return $this -> Citations[$key];
        } else// ref was not cited yet
        if ($create) {
            $index = count($this -> Citations);
            $this -> Citations[$key] = $index;
            return $index;
        } else
            return -1;
    }
   
    /*
     * Adds a period to the end of the input text, if there isn't one already.
     * @param $s - the input text
     * @return - the text with a period at the end
     */
    function period($s) {
        return $s == '' ? '' : (substr($s, strlen($s) - 1) == '.' ? $s : "$s.");
    }
    
    /*
     * Adds HTML tags to italicize the input text.
     * @param $s - the input text
     * @return - the text with italics tags
     */
    function italic($s) {
        return $s == '' ? '' : "<em>$s</em>";
    }

    /******************
     * PUB MED QUERIES
     ****************** 
     */
     
    /* Gets full citations for a list of PubMed pmids by calling the NCBI's eUtilities service.
     * @param $pmids - an array of PubMed pmids to query
     * @return - a string containing the XML file returned by the eUtilities service, or an empty string
     * if no pmids were entered
     * @author Karen Eddy
     */
    function eSummary($pmids) {
        if (count($pmids) > 0) {
            global $wgSitename, $wgEmergencyContact;
            define("EUTILS_ROOT", "http://eutils.ncbi.nlm.nih.gov/entrez/eutils/");
            define("ESUMMARY_URL", EUTILS_ROOT . "esummary.fcgi");

            $query = array("db" => "pubmed", "id" => implode(",", $pmids), "version" => "2.0", "tool" => $wgSitename, "email" => $wgEmergencyContact);

            $params = array("http" => array("method" => "POST", "content" => http_build_query($query)));

            $context = stream_context_create($params);
            $fp = @fopen(ESUMMARY_URL, 'rb', false, $context);
            if ($fp) {
                $response = @stream_get_contents($fp);
                if ($response !== false) {
                    return $response;
                }
            }
        }
        return "";
    }

    /* Takes the XML file returned from NCBI's eUtilities service and returns the formatted citations
     * @param $pmXml - the XML file returned from the call to eSummary()
     * @return $fomattedRefs - an array containing the formatted citations, indexed by pmid, or an empty
     * array if $pmXml is an empty string
     * @author Karen Eddy
     */
    function ParsePubMed($pmXml) {
        $formattedRefs = array();

        $xml = simplexml_load_string($pmXml);

        if ($xml) {
            //find the document summary tags
            $docSums = $xml;
            while ($docSums -> getName() != "DocumentSummary") {
                $docSums = $docSums -> children();
            }

            //extract required information from each document summary
            foreach ($docSums as $docSum) {
                $authors = array();

                //get the pmid
                $pmid = (string)$docSum['uid'];

                //get the list of authors
                foreach ($docSum->Authors->children() as $author) {
                    $authors[] = $author -> Name;
                }
                $authors = $this -> ConcatAuthors($authors);

                //get the other attributes
                $title = $docSum -> Title;
                $source = $this -> period($docSum -> Source);
                $pubDate = $docSum -> PubDate;
                $volume = $docSum -> Volume;
                $issue = $docSum -> Issue;
                $pages = $docSum -> Pages;
                $doi = "";

                foreach ($docSum->ArticleIds->children() as $articleId) {
                    if ($articleId -> IdType == "doi") {
                        $doi = $articleId -> Value;
                        break;
                    }
                }

                //format for output to page
                $origin = "$source $pubDate";
                $origin .= $volume == '' ? '' : ";$volume";
                $origin .= $issue == '' ? '' : "($issue)";
                $origin .= $pages == '' ? '' : ":$pages";

                $formattedRefs[$pmid] = $this -> FormatBib($authors, $title, $origin, $pmid, $doi, '', '');

            } //end foreach $docSums
        }
        return $formattedRefs;
    }
     
     
    /* Formatting of a PubMed or ISBN DB citation
     * @param $authors - a string containing the authors of the citation 
     * @param $title - a string of the title of the citation 
     * @param $origin - a string of the source of the citation 
     * @param $pmid - the PubMed ID of the citation, if it is one
     * @param $doi - the doi of the citation, if it has one
     * @param $isbn - the ISBN of the citation, if it is one
     * @param $isbndbref - the ISBN reference of the citation, if it is an ISBN
     * @return - the formatted citation
     */
    function FormatBib($authors, $title, $origin, $pmid, $doi, $isbn, $isbndbref) {
        $title = $this -> period($title);
        $title = $this -> italic($title);

        $authors = $this -> period($authors);
        $origin = $this -> period($origin);

        $codes = '';

        $result = "$authors $title $origin";
        $style = 'class="extiw" style="color:Black; text-decoration:none"';

        //set the link for the citation itself
        if ($doi != '') {
            $title = 'title="View or buy article from publisher"';
            $result = "<a href=\"http://dx.doi.org/$doi\" $title $style>$result</a>";
            $codes .= " " . $this -> HtmlInterLink("http://dx.doi.org/$doi", $this -> smallCaps("DOI:") . $doi, "DOI: $doi") . " |";
        } else if ($pmid != '') {
            $title = 'title="View or buy article from publisher (if available)"';
            $result = "<a href=\"http://eutils.ncbi.nlm.nih.gov/entrez/eutils/elink.fcgi?cmd=prlinks&dbfrom=pubmed&retmode=ref&id=$pmid\" $title $style>$result</a>";
        } else if ($isbn != '') {
            $title = 'title="Book information at isbndb.org"';
            $result = "<a href=\"http://isbndb.com/d/book/$isbndbref.html\" $title $style>$result</a>";
            $codes .= " " . $this -> HtmlInterLink("http://isbndb.com/d/book/$isbndbref.html", $this -> smallCaps("ISBN:") . $isbn, "ISBN:$isbn");
        }
        return $result . $codes;
    }

    /*
     * Takes an array of author names and formats them into a string.
     * @param $authors - an array of author names
     * @return - a string of the author names, separated by commas, with 'and' between the last two in the list.
     */
    function ConcatAuthors($authors) {
        $n = count($authors);
        $result = "";
        if ($n > 0) {
            $result = $authors[0];
            for ($i = 1; $i <= $n - 2; $i++) {
                $result .= ", $authors[$i]";
            }
            if ($n == 2) {
                $auth = $authors[$n - 1];
                $result .= " and $auth.";
            } else if ($n > 2) {
                $auth = $authors[$n - 1];
                $result .= ", and $auth.";
            }
        }
        return $result;
    }

    /*
     * Returns a PubMed URL for the input PubMed IDs
     * @param $pmids - an array of the PubMed IDs to create a link to
     * @return - the PubMed URL of the input PubMed IDs
     */
    function PubMedUrl($pmids) {
        $list_uids = implode(",", $pmids);
        return "http://www.ncbi.nlm.nih.gov/entrez/query.fcgi?cmd=Retrieve&db=pubmed&dopt=Abstract&list_uids=$list_uids";
    }

    /*
     * Returns a HubMed URL for the input PubMed IDs
     * @param $pmids - an array of the PubMed IDs to create a link to
     * @return - the HubMed URL of the input PubMed IDs
     */
    function HubMedUrl($pmids) {
        $list_uids = implode(",", $pmids);
        return "http://www.hubmed.org/display.cgi?uids=$list_uids";
    }

    /******************
     * ISBN DB QUERIES
     ****************** 
     */
     
    /*
     * Formats the input author names for output to the citation list.
     * @param $text - string containing the author names
     * @return - the formatted author names 
     */
    function FormatAuthors($text) {
        $patterns = array('/\s+([:,;.!?])/', '/c(\d+)/', '/[:,;!?]\s*$/m');
        $replacements = array('\1', '\1', '.');
        return preg_replace($patterns, $replacements, $text);
    }

    /*
     * Formats the input publisher for output to the citation list.
     * @param $text - string containing the publisher
     * @return - the formatted publisher
     */
    function FormatPublisher($text) {
        $patterns = array('/\s+([:,;.!?])/', '/c(\d+)/', '/[:,;!?]\s*$/m');
        $replacements = array('\1', '\1', '.');
        return preg_replace($patterns, $replacements, $text);
    }

    /*
     * Checks whether the input parameter is an array
     * @param $a - the input variable
     * @return - the input variable, if it is an array, otherwise an empty array
     */
    function ar($a) {
        return is_array($a) ? $a : array();
    }

    /*
     * Returns the ISBN DB key(s)
     * @return - an array of the ISBN DB key(s)
     */
    function Biblio_isbndb_keys() {
        global $isbndb_access_key, $isbndb_access_keys;
        if (isset($isbndb_access_key))
            return array($isbndb_access_key);
        else if (isset($isbndb_access_keys))
            return $isbndb_access_keys;
        else
            return array('9EOE2OGZ');
    }

    /*
     * Randomly chooses and returns an array element from the input array
     * @param $a - the array to choose an element from
     * @return - a random element from the array
     */
    function pick($a) {
        return $a[rand(0, count($a) - 1)];
    }

    /*
     * Queries the ISBN DB for the input $isbn reference, formats and returns it
     * @param $isbn - the ISBN to query
     * @return $result - the formatted ISBN reference
     */
    function IsbnDbQuery_one($isbn) {
        $access_key = $this -> pick($this -> Biblio_isbndb_keys());
        $url = "http://isbndb.com/api/books.xml?access_key=${access_key}&index1=isbn&value1=${isbn}";
        $text = $this->fetch_url($url);
        $xml_parser = new BiblioXml();
        $data = $xml_parser -> parse($text);

        $thisbook = $this -> get($this -> get($this -> get($this -> get($this -> get($data, 0), 'child'), 0), 'child'), 0);
        $isbndbref = $this -> get($this -> get($thisbook, 'attributes'), 'BOOK_ID');
        $bookinfo = $this -> ar($this -> get($thisbook, 'child'));
        $authors = '';
        $title = '';
        $origin = '';
        foreach ($bookinfo as $field) {
            switch ($this->get($field, 'name')) {
                case 'TITLE' :
                    $title = $this -> get($field, 'content');
                    break;
                case 'AUTHORSTEXT' :
                    $authors = $this -> FormatAuthors($this -> get($field, 'content'));
                    break;
                case 'PUBLISHERTEXT' :
                    $origin = $this -> FormatPublisher($this -> get($field, 'content'));
                    break;
            }
        }

        $result = $this -> FormatBib($authors, $title, $origin, '', '', $isbn, $isbndbref);
        return $result;
    }

    /*
     * Queries the ISBN DB for the input $isbns
     * @param $isbns - and array of the ISBNs to query
     * @return - the formatted ISBN references
     */
    function IsbnDbQuery($isbns) {
        $result = array();
        $cache = &wfGetMainCache();
        global $wgDBname;
        foreach ($isbns as $isbn) {
            $cache_key = "$wgDBname:Biblio:$isbn";
            if ($res = $cache -> get($cache_key)) {
                wfDebug("Biblio cache hit $cache_key\n");
            } else {
                wfDebug("Biblio cache miss $cache_key\n");
                $res = $this -> IsbnDbQuery_one($isbn);
            }
            $cache -> set($cache_key, $res, CACHE_TTL);
            $result["$isbn"] = $res;
        }
        return $result;
    }

    /******************************* 
     * General formatting functions
     ******************************* 
     */
    
    /*
     * Creates an HTML URL link from the input $url and $text
     * @param $url - the URL 
     * @param $text - the link text to show on the page
     * @return - the HTML URL link
     */
    function HtmlLink($url, $text) {
        return "<a href=\"$url\">$text</a>";
    }

    /*
     * Creates an HTML URL internal link from the input $url and $text
     * @param $url - the URL 
     * @param $text - the link text to show on the page
     * @param $title - the contents of the tooltip that shows on hover over the link
     * @return - the HTML URL internal link
     */
    function HtmlInterLink($url, $text, $title) {
        return "<a href=\"$url\" class=extiw title=\"$title\"" . "rel=\"nofollow\">$text</a>";
    }

        /*
     * Creates an HTML URL external link from the input $url and $text
     * @param $url - the URL 
     * @param $text - the link text to show on the page
     * @param $title - the contents of the tooltip that shows on hover over the link
     * @return - the HTML URL external link
     */
     function HtmlExtLink($url, $text, $title) {
        return "<a href=\"$url\" class=\"external\" title=\"$title\"" . "rel=\"nofollow\">$text</a>";
    }

    /*
     * Returns the input $text with CSS formatting for small caps.
     * @param $text - the text to format
     * @return - the text, formatted for small caps
     */
    function smallCaps($text) {
        return "<span style=\"font-variant:small-caps;\">" . $text . "</span>";
    }

    /*
     * Returns the input text with CSS formatting for MW class noprint
     * @param $s - the text to format
     * @return - the text, formatted for noprint
     */
    function noprint($s) {
        return "<span class=noprint>$s</span>";
    }

    /*
     * Returns the input text with CSS formatting for MW class error
     * @param $s - the text to format
     * @return - the text, formatted for error
     */
    function error($s) {
        return "<span class=error>$s</span>";
    }

     /*
     * Returns the input text with CSS formatting for MW class errorbox
     * @param $s - the text to format
     * @return - the text, formatted for errorbox
     */
    function errorbox($s) {
        return "<div style='float:none;' class=errorbox>$s</div>";
    }

    /*
     * Replaces line breaks with spaces in the input text
     * @param $text - the text to format
     * @return - the text with no line breaks or leading or trailing spaces
     */
    function cleanLi($text) {
        return trim(str_replace(array("\n", "\r"), " ", $text));
    }

    /*
     * Splits the $input string by the regular expression
     * @param $input - the string to split
     * @return - an array of the substrings of the $input string
     */
    function split_biblio($input) {
        return preg_split("/[[:space:]]*^[ \t]*#[[:space:]]*/m", $input, -1, PREG_SPLIT_NO_EMPTY);
    }

    /* Expands URLs non-recursively
     * @param $list - 2D array of URLs
     * @return - 2D array of URLs
     */
    function expandList($list) {
        $result = array();
        foreach ($list as $ref) {
            $matches = array();
            preg_match('/ ^ \[ ( \[[^\]]*\] | [^\]]* ) \] /sx', $ref, $matches);
            if (isset($matches[1])) {
                // It is a link to a list of references
                $link = $matches[1];
                $name = $this->unbracket($link);
                if (isset($name)) {
                    // It is a wiki or interwiki link
                    $title = Title::newFromText($name);
                    if ($title -> isLocal())
                        // It is a local page
                        $x = $this->fetch_page($title);
                    else {
                        // It is a shortcut for an external URL ("interwiki").
                        /*
                         * It must point directly to the raw bibliography database,
                         * not to a regular HTML wiki page.
                         */
                        $url = $this->make_url($link);
                        $x = $this->fetch_url($url);
                    }
                } else {
                    // It is a plain URL
                    $url = $this->make_url($link);
                    $x = $this->fetch_url($url);
                }

                $biburl = $this->make_url($link);
                foreach ($this->split_biblio($x) as $item) {
                    $result[] = array('ref' => $item, 'biburl' => $biburl);
                }
            } else
                // A single reference
                $result[] = array('ref' => $ref);
        }
        return $result;
    }

    /*
     * Parses the content of the biblio tags into entries, PubMed IDs and ISBNs
     * @param $list - 2D array of entries listed within biblio tags
     * @return - 3D array of entries, PubMed IDs and ISBNs
     */
    function parseBiblio($list) {
        $result = array();
        $pmids = array();
        $isbns = array();

        foreach ($list as $ref) {
            $matches = array();
            preg_match('/([-+A-Za-z_0-9]+)(.*?)(?:[[:space:]]\/\/(.*))?$/s', $ref['ref'], $matches);
            $key = $this -> get($matches, 1);
            $srctext = $this -> cleanLi($this -> get($matches, 2));
            $annot = $this -> get($matches, 3);
            $m = array();
            preg_match('/^[[:space:]]*pmid=([0-9]+)/', $srctext, $m);
            $pmid = $this -> get($m, 1);
            preg_match('/^[[:space:]]*isbn=([-0-9]+[Xx]?)/', $srctext, $m);
            $isbn = $this -> get($m, 1);
            $x = array('key' => $key, 'annot' => $annot);
            if ($pmid != '') {
                $x['pmid'] = $pmid;
                $pmids[] = $pmid;
            } else if ($isbn != '') {
                $x['isbn'] = $isbn;
                $isbns[] = $isbn;
            } else {// free wikitext
                $x['wikitext'] = $srctext;
            }
            if (isset($ref['biburl']))
                $x['biburl'] = $ref['biburl'];
            $result[] = $x;
        }
        return array('entries' => $result, 'pmids' => $pmids, 'isbns' => $isbns);
    }

    /* Parses wikitext
     * @param $pdata - parser data
     * @param $wikitext - the wikitext
     * @return - the parsed text
     */
    function parse_freetext($pdata, $wikitext) {
        $localParser = new Parser();
        $parserResult = $localParser -> parse($wikitext, $pdata['title'], $pdata['options'], false);
        return trim($parserResult -> getText());
    }

    /*
     * Formats comments after a reference
     * @param $s - string, the comment
     * @return - HTML / CSS formatting of the string, creating a border around it
     */
    function format_annot($s) {
        return "<dd><dl><table style=\"border:1px dashed #aaa; padding-left:1.5em; padding-right:1.5em; margin-bottom:1em\"><tr><td>$s</td></tr></table></dd></dl>";
    }

    /*
     * Parses a comment after a reference
     * @param $pdata - parser data
     * @param $wikitext - the wikitext
     * @return - a formatted comment, or the empty string if $wikitext was empty
     */
    function parse_annot($pdata, $wikitext) {
        $text = trim($wikitext);
        $result = $text == '' ? '' : $this -> format_annot($this -> parse_freetext($pdata, $text));
        return $result;
    }


    /***************************************
     * SETUP - Initializes the parser hooks.
     ***************************************
     * @author Karen Eddy 
     */
     function SetupHooks() {
        global $wgParser, $wgHooks;
        $wgParser -> setHook("cite", array(&$this,"Biblio_render_cite"));
        $wgParser -> setHook("nocite", array( &$this,"Biblio_render_nocite"));
        $wgParser -> setHook("biblio", array( &$this,"Biblio_render_biblio"));
        return true;
    }
     
    /*******************************
     * MEDIAWIKI CALLBACKS FOR TAGS
     *******************************
     */ 
     
    /* Conversion of the contents of <cite> tags
     * @param string $input - text inside <cite> tag
     * @param array $params - arguments inside <cite> tag
     * @param Parser $parser - parser
     * @return string
     */
    function Biblio_render_cite($input, $params, $parser = null) {
        return $this->render_cite($input, $this->Biblio_get_parser_data($parser), true);
    }
    
    /* Conversion of the contents of <nocite> tags
     * @param string $input - text inside <cite> tag
     * @param array $params - arguments inside <cite> tag
     * @param Parser $parser - parser
     * @return string
     */
     function Biblio_render_nocite($input, $params, $parser = null) {
          return $this->render_nocite($input, $this->Biblio_get_parser_data($parser), false);
    }
    
    /* Conversion of the contents of <biblio> tags
     * @param string $input - text inside <cite> tag
     * @param array $params - arguments inside <cite> tag
     * @param Parser $parser - parser
     * @return string
     */    
     function Biblio_render_biblio($input, $params, $parser = null) {
        global $BiblioForce;
        $force = @isset($params['force']) ? ($params['force'] == "true") : $BiblioForce;
        return $this->render_biblio($input, $this->Biblio_get_parser_data($parser), $force);
    }
     
    /****************************
     * RENDERING OF TAG CONTENTS
     ****************************
     */
     
    /* 
     * Gets the data from the parser, used in set up
     * @param $parser - the parser
     * @return - an array of the data extracted from the parser
     */
    function Biblio_get_parser_data($parser) {
        $parser_data = array();

        if ($parser != null) {
            $parser_data['parser'] = $parser;
            $parser_data['title'] = $parser -> getTitle();
            $parser_data['options'] = $parser -> getOptions();
            $parser_data['options']->enableLimitReport(false);
        } else {
            global $wgParser, $wgTitle, $wgOut;
            $parser_data['parser'] = $wgParser;
            $parser_data['title'] = $wgTitle;
            $parser_data['options'] = $wgOut -> mParserOptions;
        }
        return $parser_data;
    }

    /* Conversion of the contents of <cite> tags
     * @param $input - text inside <cite> tags
     * @param $pdata - parser data
     * @param $render - boolean - if true, citation will be created and returned; if false, returns empty string
     * @return - string with numbered citation(s) for insertion into the text     
     */
    function render_cite($input, $pdata, $render = true) {
        $keys = preg_split('/[^-+A-Za-z_0-9]+/', $input, -1, PREG_SPLIT_NO_EMPTY);
        $list = array();
        foreach ($keys as $key) {
            $index = $this -> CitationIndex($key, true);
            $list[] = array($index, $key);
        }
        if ($render) {
            sort($list);
            $links = array();
            foreach ($list as $ent) {
                $link = $this -> HtmlLink("#bibkey_$ent[1]", $ent[0] + 1);
                $links[] = $link;
            }
            return "[" . implode(", ", $links) . "]";
        } else
            return "";
    }

    /* Conversion of the contents of <nocite> tags - reference will be included, even though not cited in text
     * @param $input - text inside <nocite> tags
     * @param $pdata - parser data
     * @return - empty string
     */
    function render_nocite($input, $pdata) {
        return $this -> render_cite($input, $pdata, false);
    }

    /* Conversion of the contents of <biblio> tags
     * @param $input - text inside <biblio> tags
     * @param $pdata - parser data
     * @param $force - boolean - if true, references will be listed even if not cited in text; 
     *  if false, references will only be listed if cited in text
     * @return - array of formatted references
     */
    function render_biblio($input, $pdata, $force) {
        global $wgDBname;

        $refs = array();
        $list = $this->expandList($this -> split_biblio($input));
        $parseResult = $this->parseBiblio($list);
        $entries = $parseResult['entries'];
        $pmids = $parseResult['pmids'];
        $isbns = $parseResult['isbns'];
        $pmentries = array();
        $pmids_to_fetch = array();

        //caching features
        $cache = &wfGetMainCache();
        foreach ($pmids as $pmid) {
            $cache_key = "$wgDBname:Biblio:$pmid";
            if ($res = $cache -> get($cache_key)) {
                wfDebug("Biblio cache hit $cache_key\n");
                $pmentries["$pmid"] = $res;
            } else {
                wfDebug("Biblio cache miss $cache_key\n");
                array_push($pmids_to_fetch, $pmid);
            }
        }

        //retrieve data for pmids
        if (count($pmids_to_fetch)) {
            //get the xml file from eSummary call & parse it for output to the page
            $pmXml = $this -> eSummary($pmids_to_fetch);
            $pmentries1 = $this -> ParsePubMed($pmXml);

            foreach ($pmentries1 as $pmid => $value) {
                $pmentries[$pmid] = $value;
            }
        }

        //set the cache for the formatted pmid citations just returned from eSummary
        foreach ($pmentries as $pmid => $value) {
            $cache_key = "$wgDBname:Biblio:$pmid";
            $cache -> set($cache_key, $value, CACHE_TTL);
        }
        
        //retrieve data for ISBNs
        $isbnentries = $this -> IsbnDbQuery($isbns);
        $refs = array();
        $errors = array();
        
        //go through all entries and extract data to format reference
        foreach ($entries as $ref) {
            $key = $this -> get($ref, 'key');
            $annot = $this -> parse_annot($pdata, $this -> get($ref, 'annot'));
            $pmid = $this -> get($ref, 'pmid');
            $isbn = $this -> get($ref, 'isbn');
            $wikitext = $this -> get($ref, 'wikitext');
            $biburl = $this -> get($ref, 'biburl');
            $text = '';

            //add links to articles at the end of the reference
            if (!is_null($pmid)) { // PubMed result
                $pmlink = $this -> HtmlInterLink($this -> PubMedUrl(array($pmid)), $this -> smallCaps(" PubMed ID:") . "$pmid", "PubMed ID: $pmid");
                $hmlink = $this -> HtmlInterLink($this -> HubMedUrl(array($pmid)), $this -> smallCaps("HubMed"), "PubMed ID: $pmid");
                if (array_key_exists($pmid, $pmentries)) {
                    $text = $pmentries["$pmid"] . $this -> noprint(" $pmlink | $hmlink");
                } else {
                    $error = "Error fetching PMID $pmid: $pmerror";
                    array_push($errors, $error);
                    $text = $this -> error($error);
                }
            } else if (!is_null($isbn)) // ISBN
            {
                $text = $isbnentries["$isbn"];
            } else if (!is_null($wikitext))// plain wikitext
            {
                $text = $this -> parse_freetext($pdata, $wikitext);
            }
            $index = $this -> CitationIndex($key, $force);
            if ($index >= 0)
                $refs[] = array('index' => $index, 'key' => $key, 'text' => $text, 'pmid' => $pmid, 'isbn' => $isbn, 'annot' => $annot, 'biburl' => $biburl);
        }
        sort($refs);
        reset($refs);
        $sorted_pmids = array();
        foreach ($refs as $ref) {
            $pmid = $this -> get($ref, 'pmid');
            if (!is_null($pmid)) { $sorted_pmids[] = $pmid;
            }
        }
        $header = "";
        $footer = "";
        if (count($errors)) {
            $header = $this -> errorbox(implode("<br>", $errors));
        }
        if (count($sorted_pmids) > 1) {
            $footer .= 'All Medline abstracts: ' . $this -> HtmlInterLink($this -> PubMedUrl($sorted_pmids), $this -> smallCaps("PubMed"), "All abstracts at PubMed") . " | " . $this -> HtmlInterLink($this -> HubMedUrl($sorted_pmids), $this -> smallCaps("HubMed"), "All abstracts at HubMed");
            $footer = $this -> noprint($footer);
        }
        $result = array();
        foreach ($refs as $ref) {
            $index = $this -> get($ref, 'index') + 1;
            $key = $this -> get($ref, 'key');
            $annot = $this -> get($ref, 'annot');
            $text = $this -> get($ref, 'text');
            $vkey = "<span style=\"color:#aaa\">[$key]</span>";
            if (isset($ref['biburl'])) {
                $biburl = htmlspecialchars($ref['biburl']);
                $vkey = "<a href=\"$biburl\" class=\"extiw\" style=\"text-decoration:none\" title=\"link to bibliography database\">$vkey</a>";
            }
            $vkey = $this -> noprint($vkey);
            $vkey .= " $annot";
            $result[] = "<li id=\"bibkey_$key\" value=\"$index\"> $text $vkey\n</li>";
        }

        //error_reporting($initial_error_reporting);
        global $version;
        return $header . "<!-- produced by BiblioPlus version " . $version . " --><br>" 
            . '<ol>' . implode("", $result) . '</ol>' . $footer;
    }
 
     /***********************
     *  Debugging functions
     ***********************
     */
    
    /*
     * Wraps a string in an HTML comment tag and prints it out.
     */
    function comment($x) {
        echo "<!-- $x -->\n";
    }

    /*
     * Wraps an array in an HTML comment tag and prints it out.
     */
     function comment_r($x) {
        echo "<!--\n";
        print_r($x);
        echo "\n-->\n";
    }
     
} //end of BiblioPlus class definition
