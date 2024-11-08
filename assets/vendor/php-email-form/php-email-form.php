<?php
class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp = false;
    public $messages = array();
    public $ajax = false;

    public function add_message($content, $label, $position = 1) {
        $this->messages[] = array(
            'label' => $label,
            'content' => $content,
            'position' => $position
        );
    }

    public function send() {
        $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
        $headers .= "Reply-To: " . $this->from_email . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $email_content = "<h3>" . htmlspecialchars($this->subject) . "</h3>";
        foreach ($this->messages as $message) {
            $email_content .= "<p><strong>" . htmlspecialchars($message['label']) . ":</strong> " . nl2br(htmlspecialchars($message['content'])) . "</p>";
        }

        return mail($this->to, $this->subject, $email_content, $headers);
    }
}
?>