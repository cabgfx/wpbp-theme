<?php
/**
 * Custom functions
 */

// Helo.app local mail catcher
function helo($phpmailer)
{
  $phpmailer->isSMTP();
  $phpmailer->Host = '127.0.0.1';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = 'Mailbox-Name';
  $phpmailer->Password = '';
}

if (defined('WPBP_ENV') && (WPBP_ENV == 'development')) {
  add_action('phpmailer_init', 'helo');
}

