<?php
  class message {
    public $chatId;
    public $sentAt;
    public $message;
    public $sentBy;

    function __construct ($chatId, $sentAt, $message, $sentBy) {
      $this->chatId = $chatId;
      $this->sentAt = $sentAt;
      $this->message = $message;
      $this->sentBy = $sentBy;
    }
  }
?>