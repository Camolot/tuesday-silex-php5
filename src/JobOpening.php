<?php
  class JobOpening
  {
      private $title;
      private $desc;
      private $contact;

      function __construct($job_title, $job_desc, $job_contact)
      {
          $this->title = $job_title;
          $this->desc = $job_desc;
          $this->contact = $job_contact;
      }

      function setTitle ($job_title)
      {
        $this->title = $job_title;
      }

      function setDesc ($job_desc)
      {
        $this->desc = $job_desc;
      }

      function setContact ($job_contact)
      {
        $this->contact = $job_contact;
      }

      function getTitle ()
      {
        return $this->title;
      }

      function getDesc ()
      {
        return $this->desc;
      }

      function getContact ()
      {
        return $this->contact;
      }
  }
?>
