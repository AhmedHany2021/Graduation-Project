<?php
namespace PROJECT\MODELS;


use PROJECT\CORE\DATABASE\databasehandler;

class abstractmodel {
  use \PROJECT\CORE\securedata;
  protected const PARAM_INT =   \pdo::PARAM_INT;

  protected const PARAM_BOOL =   \pdo::PARAM_BOOL;

  protected const PARAM_STR =   \pdo::PARAM_STR;

  protected const PARAM_FLOAT =   4;

  protected const PARAM_DATE =   5;

  private function make_statment(array $param)
  {

        $param_statment = "";
        foreach ($param as $value) 
        {
            $param_statment .= $value .' = :' .$value .' ,';
        }
        return trim($param_statment,' ,');
  }

  private function bindvalues(\PDOStatement & $stmt, array $param)
  {

        foreach ($param as $key => $value)
        {
            if($value == 4)
            {
               $santized_value = filter_var($this->$key,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
               $stmt->bindValue(":{$key}",$santized_value);
            }
            else if($value == 5)
            {
                $stmt->bindValue(":{$key}",$this->$key);
            }
            else 
            {
                    $stmt->bindValue(":{$key}", $this->$key,$value);
            }
        }
  }

  private function make_cond(array $options, $condition)
  {

        $cond = "";
        foreach ($options as $value)
        {
            $cond .= $value . " = :" . $value . " " .$condition . " ";
        }
        return trim($cond," ".$condition);
  }

  protected function create($tableName, array $tableschema)
  {

        $sql = "INSERT INTO ". $tableName . " SET ";       
        $sql .= $this->make_statment(array_keys($tableschema));
        $stmt = databasehandler::factory()->prepare($sql);
        $this->bindvalues($stmt,$tableschema);
        return $stmt->execute();
  }

  protected function update($tableName, array $tableschema, array $options, $condition)
  {

        $sql = "UPDATE " . $tableName . " SET ";
        $sql .= $this->make_statment(array_keys($tableschema));
        $sql .= " WHERE " ;
        $sql .= $this->make_cond(array_keys($options), $condition);
        $stmt = databasehandler::factory()->prepare($sql);
        $this->bindvalues($stmt, $tableschema);
        $this->bindvalues($stmt, $options);
        return $stmt->execute();
  }

  protected function delete($tableName, array $options, $condition)
  {

        $sql = "DELETE FROM " . $tableName . " WHERE " . $this->make_cond(array_keys($options), $condition);
        $stmt = databasehandler::factory()->prepare($sql);
        $this->bindvalues($stmt, $options);
        return $stmt->execute();
  }

  protected function getall($tableName, array $tableschema, $pk)
  {

        $sql = "SELECT * FROM " . $tableName;
        $obj = null;
        $arr = array();
        $arr[] = $pk;
        foreach (array_keys($tableschema) as $value)
        {
            $arr[] = $value; 
        }
        $stmt = databasehandler::factory()->prepare($sql);
        if( $stmt->execute())
        {
            if(method_exists(get_called_class(), '__construct'))
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),$arr);
            }
            else
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
            }
            if(is_array($obj) && !empty($obj))
            {
                return $obj;
            }
            else
            {
                return false;
            }
        }
        return false;
  }

  protected function getallby($tableName, array $tableschema, $pk, array $options, $condition)
  {

        $obj = null;
        $arr = array();
        $arr[] = $pk;
        foreach (array_keys($tableschema) as $value)
        {
            $arr[] = $value; 
        }
        $sql = "SELECT * FROM " . $tableName . " WHERE " ;
        $sql .= $this->make_cond(array_keys($options), $condition);
        $stmt = databasehandler::factory()->prepare($sql);
        $this->bindvalues($stmt, $options);
        if( $stmt->execute())
        {
            if(method_exists(get_called_class(), '__construct'))
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),$arr);
            }
            else
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
            }
            if(is_array($obj) && !empty($obj))
            {
                return $obj;
            }
            else
            {
                return false;
            }
        }
        return false;      
  }

  protected function getbypk($tableName, array $tableschema, $pk)
  {

        $obj = null;
        $arr = array();
        $arr[] = $pk;
        foreach (array_keys($tableschema) as $value)
        {
            $arr[] = $value; 
        }
        $sql = "SELECT * FROM " . $tableName . " WHERE " . $pk . " = :" .$pk;
        $stmt = databasehandler::factory()->prepare($sql);
        $stmt->bindValue(":{$pk}", $this->$pk);
        if( $stmt->execute())
        {
            if(method_exists(get_called_class(), '__construct'))
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),$arr);
            }
            else
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
            }
            if(is_array($obj) && !empty($obj))
            {
                return array_shift($obj);
            }
            else
            {
                return false;
            }
        }
        return false;
  }

  protected function getby($tableName, array $tableschema, $pk, array $options, $condition)
  {

        $obj = null;
        $arr = array();
        $arr[] = $pk;
        foreach (array_keys($tableschema) as $value)
        {
            $arr[] = $value; 
        }
        $sql = "SELECT * FROM " . $tableName . " WHERE " ;
        $sql .= $this->make_cond(array_keys($options), $condition);
        $stmt = databasehandler::factory()->prepare($sql);
        $this->bindvalues($stmt, $options);
        if( $stmt->execute())
        {
            if(method_exists(get_called_class(), '__construct'))
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),$arr);
            }
            else
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
            }
            if(is_array($obj) && !empty($obj))
            {
                return array_shift($obj);
            }
            else
            {
                return false;
            }
        }
        return false;
  }

  protected function write_sql($sql, $options = [] , $is_select = false)
  {

        $stmt = databasehandler::factory()->prepare($sql);
        if(!empty($options))
        {
            $this->bindvalues($stmt, $options);
        }
        if(!$is_select)
        {
            if( $stmt->execute())
            {
                if(method_exists(get_called_class(), '__construct'))
                {
                    $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),$arr);
                }
                else
                {
                    $obj = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
                }
                if(is_array($obj) && !empty($obj))
                {
                    return array_shift($obj);
                }
                else
                {
                    return false;
                }
            }
        }
        else
        {
            return $stmt->execute();
        }
  }

}

