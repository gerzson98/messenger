<?php
  class cardData {
    public $chatId;
    public $othersName;
    public $lastMessage;

    function __construct ($chatId, $othersName, $lastMessage) {
      $this->chatId = $chatId;
      $this->othersName = $othersName;
      $this->lastMessage = $lastMessage;
    }
  }
?>