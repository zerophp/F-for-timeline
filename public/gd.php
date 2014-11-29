<?php 

require_once '../vendor/google-api-php-client-master/autoload.php'; // or wherever autoload.php is located

$client = new Google_Client();
// $client->setApplicationName("Client_Library_Examples");
$client->setApplicationName("F for Timeline");
$client->setDeveloperKey("AIzaSyDFlgauCapd-K2jymm0iPOesitHCDr8fO0");

$service = new Google_Service_Drive($client);
// $optParams = array('filter' => 'free-ebooks');
// $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

// foreach ($results as $item) {
// echo $item['volumeInfo']['title'], "<br /> \n";
// }

$client_id = '889066634230-e7j68jfa4mr34dq8idksoa5ma3rvfakl.apps.googleusercontent.com';
$client_secret = 'UiJfT-qYo7QPJ5sFNNg6e4aB ';
$redirect_uri = 'http://servotal.com';
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/drive");
$service = new Google_Service_Drive($client);





/**
 * Retrieve a list of File resources.
 *
 * @param Google_DriveService $service Drive API service instance.
 * @return Array List of Google_DriveFile resources.
 */
function retrieveAllFiles($service) {
    $result = array();
    $pageToken = NULL;

    do {
        try {
            $parameters = array();
            if ($pageToken) {
                $parameters['pageToken'] = $pageToken;
            }
            $files = $service->files->listFiles($parameters);

            $result = array_merge($result, $files->getItems());
            $pageToken = $files->getNextPageToken();
        } catch (Exception $e) {
            print "An error occurred: " . $e->getMessage();
            $pageToken = NULL;
        }
    } while ($pageToken);
    return $result;
}
$result = retrieveAllFiles($service);
echo "<pre>";
print_r($result);
echo "</pre>";