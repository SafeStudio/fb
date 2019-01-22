<?php declare(strict_types=1);

namespace SafeStudio\Firebase;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Firebase
{
    /**
     * @var array
     */
    private $firebase;

    /**
     * Firebase constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $requiredFields = ['project_id', 'client_id', 'client_email', 'private_key'];
        $config = [];
        foreach ($requiredFields as $field) {
            $value = config('services.firebase.' . $field);
            if (!isset($value)) {
                throw new \Exception('Missing config `services.firebase.' . $field . '`');
            }
            if ($field === 'private_key') {
                $value = str_replace('\\n', PHP_EOL, $value);
            }
            $config[$field] = $value;
        }

        $databaseURL = config('services.firebase.database_url');
        $serviceAccount = ServiceAccount::fromArray($config);

        $this->firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri($databaseURL)
            ->create()->getDatabase();
    }


    /**
     * Fetch data from Firebase
     * @param string $path
     * @return string
     */
    public function get(string $path)
    {
        return json_encode($this->firebase->getReference($path)->getValue());
    }

    /**
     * Writing data into Firebase
     * @param string $path
     * @param array $data
     * @return string
     */
    public function set(string $path, array $data)
    {
        return json_encode($this->firebase->getReference($path)->set($data)->getValue());
    }

    /**
     * Updating data into Firebase
     * @param string $path
     * @param array $data
     * @return string
     */
    public function update(string $path, array $data)
    {
        $updates = [$path => $data];

        return json_encode($this->firebase->getReference($path)->update($updates)->getValue()[$path]);
    }

    /**
     * Pushing data into Firebase
     *
     * @param string $path
     * @param array $data
     * @return string
     */
    public function push(string $path, array $data)
    {
        return json_encode($this->firebase->getReference($path)->push($data)->getValue());
    }

    /**
     * Deletes data from Firebase
     * @param string $path
     * @return string
     */
    public function delete(string $path)
    {
        return json_encode($this->firebase->getReference($path)->remove()->getValue());
    }
}
