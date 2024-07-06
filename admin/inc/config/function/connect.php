<?php
$table_user = "tbl_user";
class Database
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'english_php';
    private $conn;

    ###------------------------- CONNECTION ----------------------------###

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "connection Failed :" . $e->getMessage();
        }
    }

    ## -------------------------- html AND TEXT VELIDATION TRIM -------------------------###
    public function text_filter($form_data)
    {
        $form_data = trim($form_data);
        $form_data = stripslashes($form_data);
        $form_data = strip_tags($form_data);
        $form_data = htmlspecialchars($form_data);
        return $form_data;
    }

    ## ---------------------------- SQL Get data -------------------------- ##
    public function query_sql($query_data)
    {
        $sql = $this->conn->prepare($query_data);
        $data = $sql->execute();
        if ($data !== false) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            if ($data) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    ## ---------------------------------- Insert Query function ------------------------ ##

    public function insert_query($tbl_query, $data)
    {
        $string = "INSERT INTO " . $tbl_query . " (";
        $string .= implode(",", array_keys($data)) . ') VALUES (';
        $string .= "'" . implode("','", array_values($data)) . "')";
        $result = $this->conn->prepare($string);

        $result->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //  -------------------------- strlen ---------------------

    function getFirstWords($string, $wordCount)
    {
        // Remove any extra spaces and special characters
        $string = trim(preg_replace('/\s+/', ' ', $string));

        // Split the string into an array of words
        $words = explode(' ', $string);

        // Get the first $wordCount words
        $firstWords = array_slice($words, 0, $wordCount);

        // Join the words back into a string
        return implode(' ', $firstWords);
    }


    ##-------------------------------  update update --------------------------------##
    public function update_query($table, $para = array(), $id)
    {
        $args = array();
        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }
        $sql11 = "UPDATE  $table SET " . implode(',', $args);
        $sql11 .= " WHERE $id";
        $result = $this->conn->query($sql11);
        if ($result) {
            return true;
            //$array  = array('status' =>'success' ,'msg'=>'Record successfully Updated!!');
        } else {
            return false;
            //$array  = array('status' =>'error' ,'msg'=>'Something went wrong. Please try after sometime!!!');
        }
        //  echo json_encode($array);
    }


    ## ------------------------------- SQL  UPDATE & DELETE ---------------------------------- ##
    # -- delsql function
    public function delete_sql($sql999)
    {
        $sql1 = $this->conn->prepare($sql999);
        $result2 = $sql1->execute();

        if ($result2) {
            return true;
        } else {
            return false;
        }
    }

    ##----------------------------- select BASIS ON ID -------------------------------- ##

    public function select_assoc($table, $where)
    {
        $select = $this->conn->prepare("SELECT * FROM $table WHERE id = $where");
        $result2 = $select->execute();
        if ($result2 !== false) {
            $result2 = $select->fetchAll(PDO::FETCH_ASSOC);
            if ($result2) {
                return $result2;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //-------------- ------ SELECT ALL SELECT ALL SELECT ALL SELECT ALL    -----------------///
    public function tbl_select($tblname)
    {
        $sql3 = $this->conn->prepare("SELECT * FROM $tblname");
        $result = $sql3->execute();
        if ($result !== false) {
            $result = $sql3->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    //-------------  Delete sql --------------- //
    public function delete($tname, $idx)
    {

        $sqll = $this->conn->prepare("DELETE FROM $tname WHERE id = :id");
        $sqll->bindParam(':id', $idx, PDO::PARAM_INT);
        $result = $sqll->execute();
        if ($result) {
            return $result;
            $array  = array('status' => 'success', 'msg' => 'Record successfully deleted!!');
        } else {
            $array  = array('status' => 'error', 'msg' => 'Something went wrong. Please try after sometime!!!');
        }
        echo json_encode($array);
    }

    //  ======================= Encryption Function: ==================== //

    function encryptId($id, $secretKey) {
        $cipherMethod = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($cipherMethod);
        $iv = openssl_random_pseudo_bytes($ivLength);
        
        // Encrypt the ID
        $encrypted = openssl_encrypt($id, $cipherMethod, $secretKey, 0, $iv);
        
        if ($encrypted === false) {
            throw new Exception('Encryption failed');
        }
        
        // Combine IV and encrypted data, then base64 encode
        $encryptedData = base64_encode($iv . $encrypted);
        return $encryptedData;
    }
    
    function decryptId($encryptedId, $secretKey) {
        $cipherMethod = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($cipherMethod);
        
        // Decode base64 and extract IV and encrypted data
        $encryptedId = base64_decode($encryptedId);
        $iv = substr($encryptedId, 0, $ivLength);
        $encryptedText = substr($encryptedId, $ivLength);
        
        // Decrypt the data
        $decrypted = openssl_decrypt($encryptedText, $cipherMethod, $secretKey, 0, $iv);
        
        if ($decrypted === false) {
            throw new Exception('Decryption failed');
        }
        
        return $decrypted;
    }
    
   
    
    
}
