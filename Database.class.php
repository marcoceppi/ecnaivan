<?php

/**
 * In a more perfect example, the datasource interface would define all
 * the methods that each datasource would need (whether it be MySQL, 
 * PgSQL, CSV, etc)
 */
interface datasource
{
	public function find($criteria, $single);
	public function save($row);
	public function insert($row);
	public function update($row);
	public function delete($row);
}

class MySQL extends PDO implements datasource
{
	public function MySQL($host, $user, $database, $password)
	{
		// Do the connection song and dance, etc
	}
	
	public function find($criteria = array(), $single = false)
	{
		foreach( $criteria as $key => $value )
		{
			// Build the WHERE query PSUEDOCODE
			$where = '...';
			$exec = array(); // of the :key => $value pairing
		}
		
		$sql = 'SELECT p.id, p.name, pd.key, pd.value FROM people AS p INNER JOIN people_data AS pd ON p.id = pd.people_id WHERE ' . $where;
		$stm = $this->prepare($sql);
		$stm->execute($exec);
		
		return ($single) ? $stm->fetch() : $stm->fetchAll();
	}
	
	public function save($row)
	{
		// Magic method that uses find() and builds criteria from each 
		// *_id array key. Though it could just use every field from the
		// row as the find() criteria. Ultimately if you find a result
		// from the find() method you'll need to run an update, otherwise
		// it's an insert.
	}
	
	public function insert($row)
	{
		// SQL insert after data sanitization
	}
	
	public function update($row)
	{
		// extract the keys (typically *_id) and update the matching rows
		// with the rest of the $row data
	}
	
	public function delete($row)
	{
		// Same as update, only perform a deletion of the row if all 
		// criteria matches.
	}
}
