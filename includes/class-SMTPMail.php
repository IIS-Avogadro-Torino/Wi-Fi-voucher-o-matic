<?php
######################################################################
# Wi-Fi-Activationcode-o-matic - Wi-Fi Activationcode manager
# Copyright (C) 2017 Valerio Bozzolan, Ivan Bertotto, ITIS Avogadro
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.If not, see <http://www.gnu.org/licenses/>.
######################################################################

// SMTP_SERVER
// SMTP_PORT
// SMTP_USERNAME
// SMTP_PASSWORD
// SMTP_AUTH
// MAIL_SENDER

class SMTPMail {
	static function send($to, $subject, $body) {
		$ln = "\r\n";

		require_once NET_SMTP_PATH;

		if( ! ($smtp = new Net_SMTP(SMTP_SERVER, SMTP_PORT)) ) {
			die("Unable to instantiate Net_SMTP object {$smtp->getUserInfo()}");
		}

		if( PEAR::isError($e = $smtp->connect()) ) {
			die("Impossibile connettersi al server e-mail: {$e->getMessage()}");
		}

		if( PEAR::isError($e = $smtp->auth(SMTP_USERNAME, SMTP_PASSWORD, SMTP_AUTH, false)) ) {
			die("Impossibile autenticarsi al server e-mail: {$e->getMessage()}");
		}

		if( DEBUG ) {
			$smtp->setDebug(true);
		}

		if( PEAR::isError( $smtp->mailFrom(MAIL_SENDER) ) ) {
			die("Unable to set sender");
		}

		force_array($to);
		if( ! count( $to ) ) {
			error_die("Specify one e-mail address.");
		}

		foreach($to as $to_address) {
			if( PEAR::isError($res = $smtp->rcptTo($to_address)) ) {
				die("Unable to add recipient <$to_address>: " . $res->getMessage() . "\n");
			}
		}

		$firm = sprintf(
			_("Messaggio inviato da %s."),
			SITE_NAME
		);

		$headers = [
			'Subject' => $subject,
			'To' => sprintf(
				'%s <%s>',
				_("Gentile utente"),
				$to[0]
			),
			'From' => sprintf(
				'%s <%s>',
				SITE_NAME,
				MAIL_SENDER
			),
			'Content-Type' => 'text/html;charset=utf-8'
		];

		$merge = [];
		foreach($headers as $header => $value) {
			$value = str_truncate($value, 70);
			$value = trim($value);
			$merge[] = sprintf("%s: %s", $header, $value);
		}
		$headers = implode($ln, $merge);

		// Newline + empty line
		if( PEAR::isError($smtp->data("$headers$ln$ln$body")) ) {
			die("Unable to send data\n");
		}

		$smtp->disconnect();
	}
}
