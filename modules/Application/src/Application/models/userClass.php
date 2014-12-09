<?php


class userClass
{
    protected $config;
    public $name;
    public $email;
    private $password;
    private $id;
    /**
     * Create user into repository
     * 
     * @param array $postfilter
     */
    public function create($postfilter);
    
    /**
     * Delete user from repository
     * @param string $id
     */
    public function delete($id);
    
    /**
     * Get all users from repository
     */
    public function fetchAll();
    
    /**
     * Get single user from repository
     * @param string $id
     */
    public function fetch($id);
    
    /**
     * Update single user into repository
     * @param string $id
     * @param array $postfilter
     */
    public function patch($id, $postfilter);
    
    
    /**
     * Update all users into repository
     * @param array $postfilter
     */
    public function update($postfilter);
    
}