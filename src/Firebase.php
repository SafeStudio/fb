<?php declare(strict_types=1);

namespace SafeStudio\Firebase;

use Firebase\FirebaseLib;

class Firebase
{

    /**
     * @var string
     */
    private $database_url;

    /**
     * @var string
     */
    private $secret;

    public function __construct()
    {
        $this->database_url = config('services.firebase.database_url');
        $this->secret = config('services.firebase.secret');
    }

    public function setBaseURI($baseURI)
    {
        $this->send()->setBaseURI($baseURI);
    }

    public function send()
    {
        return new FirebaseLib($this->database_url, $this->secret);
    }


    /**
     * Fetch data from Firebase
     * @param string $path
     * @param array $options
     * @return array
     */
    public function get(string $path, array $options = [])
    {
        return $this->send()->get($path, $options);
    }

    /**
     * Writing data into Firebase with a PUT request
     * @param string $path
     * @param array $data
     * @param array $options
     * @return array
     */
    public function set(string $path, array $data, array $options = [])
    {
        return $this->send()->set($path, $data, $options);
    }

    /**
     * Updating data into Firebase with a PATH request
     * @param string $path
     * @param array $data
     * @param array $options
     * @return array
     */
    public function update(string $path, array $data, array $options = [])
    {
        return $this->send()->update($path, $data, $options);
    }

    /**
     * Pushing data into Firebase with a POST request
     *
     * @param string $path
     * @param array $data
     * @param array $options
     * @return array
     */
    public function push(string $path, array $data, array $options = [])
    {
        return $this->send()->push($path, $data, $options);
    }

    /**
     * Deletes data from Firebase
     * @param string $path
     * @param array $options
     * @return array
     */
    public function delete(string $path, array $options = [])
    {
        return $this->send()->delete($path, $options);
    }
}
