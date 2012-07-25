<?php 

 /* 
 *  Helper class that parses XML
 *  Used for ISBN queries
 */
class BiblioXml {
  var $parser;
  var $data;

  function tag_open($parser, $name, $attrs) {
    $data['name'] = $name;
    $data['attributes'] = $attrs;
    $this->data[] = $data;
  }

  function tag_close($parser, $name) {
    if (count($this->data) > 1) {
      $data = array_pop($this->data);
      $index = count($this->data) - 1;
      $this->data[$index]['child'][] = $data;
    }
  }

  function cdata($parser, $s) {
    $index = count($this->data) - 1;
    if (array_key_exists('content',$this->data[$index]))
      $this->data[$index]['content'] .= $s;
    else
      $this->data[$index]['content'] = $s;
  }

  function parse ($text) {
    $this->parser = xml_parser_create();
    xml_set_object($this->parser, $this);
    xml_set_element_handler($this->parser, "tag_open", "tag_close");
    xml_set_character_data_handler($this->parser, "cdata");
    xml_parse($this->parser, $text, true);
    xml_parser_free($this->parser);
    return $this->data;
  }
}

?>