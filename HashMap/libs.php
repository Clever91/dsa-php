<?php

class HashMap {
    private $buckets;
    private $size;
    
    // Constructor to initialize the HashMap with a fixed number of buckets
    public function __construct($size = 10) {
        $this->size = $size;
        $this->buckets = array_fill(0, $size, null);  // Create an array of empty buckets
    }

    // Hash function to convert a key into a bucket index
    private function hash($key) {
        return crc32($key) % $this->size;
    }

    // Insert or update a key-value pair into the HashMap
    public function put($key, $value) {
        $index = $this->hash($key);  // Get the index for the key

        // Check if the bucket is empty
        if ($this->buckets[$index] === null) {
            $this->buckets[$index] = [];
        }

        // Check if the key already exists in the bucket and update the value if it does
        foreach ($this->buckets[$index] as &$pair) {
            if ($pair[0] === $key) {
                $pair[1] = $value;  // Update existing value
                return;
            }
        }

        // If the key does not exist, add a new key-value pair (collision handled by chaining)
        $this->buckets[$index][] = [$key, $value];
    }

    // Retrieve a value by its key
    public function get($key) {
        $index = $this->hash($key);  // Get the index for the key
        if ($this->buckets[$index] !== null) {
            foreach ($this->buckets[$index] as $pair) {
                if ($pair[0] === $key) {
                    return $pair[1];  // Return the value if the key is found
                }
            }
        }
        return null;  // Return null if the key is not found
    }

    // Delete a key-value pair by its key
    public function remove($key) {
        $index = $this->hash($key);  // Get the index for the key
        if ($this->buckets[$index] !== null) {
            foreach ($this->buckets[$index] as $i => $pair) {
                if ($pair[0] === $key) {
                    // Remove the key-value pair from the bucket
                    unset($this->buckets[$index][$i]);
                    return true;
                }
            }
        }
        return false;  // Return false if the key is not found
    }

    // Display the contents of the HashMap (for testing/debugging purposes)
    public function display() {
        foreach ($this->buckets as $i => $bucket) {
            echo "Bucket $i: ";
            if ($bucket === null) {
                echo "Empty\n";
            } else {
                foreach ($bucket as $pair) {
                    echo "[" . $pair[0] . " => " . $pair[1] . "] ";
                }
                echo "\n";
            }
        }
    }
}