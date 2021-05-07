<?PHP
/**
 * A HTTP client command-line app.
 *
 * Created by: Petrov Dumitru
 */

require 'vendor/autoload.php';

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

if ($argc < 2)
	die("usage: {$argv[0]} [GET|POST|HEAD|OPTIONS] URL [JSON data to send]\n");

$url = ($argc >= 3) ? $argv[2] : $argv[1];
$method = ($argc >= 3) ? strtolower($argv[1]) : 'GET';
if (false === in_array($method, [
								'get',
								'post',
								'head',
								'options'
							])) {
	die("\e[38;5;160mError\e[0m: Invalid option '{$argv[1]}'.\n");
}
$json = (isset($argv[3])) ? $argv[3] : '';
handle($url, $method, $json);


/** LOGIC -------------------------------------------------*/
function	handle(string $url, string $method, string $json)
{
	$resource = parse_url($url);
	$client = new Client([
		// Base URI is used with relative requests
		'base_uri' => $resource['scheme'] . "://" . $resource['host']
	]);

	$response = $method($client, $resource, $json);

	// Print status line.
	print_status_line($response);

	// Print all headers.
	print_headers($response);

	// Print Body.
	print_body($response);
}


/** METHODS  ************************************************/
function	get(Client $client, array $resource, string $json) {
	$uri = $resource['path'] . "?" . $resource['query'];
	return $client->get($uri, ['http_errors' => false]);
}

function	post(Client $client, array $resource, string $json) {
	$uri = $resource['path'];

	return $client->request(
		'POST',
		$uri,
		[
			// Because this is array. It will be ancoded eventually.
			'json' => json_decode($json),
			'http_errors' => false
		]
	);
}

function	head(Client $client, array $resource, string $json) {
	$uri = $resource['path'] . "?" . $resource['query'];
	return $client->head($uri, ['http_errors' => false]);
}

function	options(Client $client, array $resource, string $json) {
	$uri = $resource['path'] . "?" . $resource['query'];
	return $client->options($uri, ['http_errors' => false]);
}


/** PRINTING ************************************************/
function	print_status_line(Response $response)
{
	echo "\e[48;5;8mHTTP/";
	echo $response->getProtocolVersion();
	echo " ";
	echo $response->getStatusCode();
	echo " ";
	echo $response->getReasonPhrase();
	echo "\e[0m", PHP_EOL;
}

function	print_headers(Response $response)
{
	foreach ($response->getHeaders() as $name => $values) {
		 echo "\e[0;96m" . $name . "\e[0m: \e[38;5;3m" . implode(', ', $values) . "\e[0m\r\n";
	}
}

function	print_body(Response $response)
{
	$body = $response->getBody();
	echo PHP_EOL, $body, PHP_EOL;
}
