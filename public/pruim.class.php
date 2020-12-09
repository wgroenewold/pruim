<?php

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

require_once('app/api.php');
require_once('app/helpers.php');
require_once('app/slack.php');

setlocale(LC_ALL, 'nl_NL');

pruim::instance();

/**
 * Class pruim
 */
class pruim
{
	/**
	 * Singleton holder
	 */
	private static $instance;

	/**
	 * Get the singleton
	 *
	 * @return pruim
	 */
	public static function instance()
	{
		if (!isset(self::$instance)) {
			self::$instance = new static();
		}

		return self::$instance;
	}

	private function __construct()
	{
		$this->api = new pruim_api();
		$this->helpers = new pruim_helpers();
		$this->slack = new pruim_slack();
	}
}