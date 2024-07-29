<?php

namespace Provider\Handlers;

use Exception;
use PDO;
use PDOException;

class Database
{
    /**
     *Database $instance
     */
    protected static $instance;

    /**
     * Database $connection
     */
    protected static $connection;

    /**
     * Select data
     *
     * @var string
     */
    protected static $select;

    /**
     * Table Name
     *
     * @var string
     */
    protected static $table;

    /**
     * Join Data|Table
     *
     * @var string
     */
    protected static $join;

    /**
     * Where Value
     *
     * @var string
     */
    protected static $where;

    /**
     * Where binding
     *
     * @var array
     */
    protected static array $where_binding = [];

    /**
     * Group by Data
     *
     * @var string
     */
    protected static $group_by;

    /**
     * Having Data
     *
     * @var string
     */
    protected static $having;

    /**
     * Having binding
     *
     * @var array
     */
    protected static array $having_binding = [];

    /**
     * Order by Data
     *
     * @var string
     */
    protected static $order_by;

    /**
     * Limit
     *
     * @var string
     */
    protected static $limit;

    /**
     * Offset
     *
     * @var string
     */
    protected static $offset;

    /**
     * Query
     *
     * @var string
     */
    protected static $query;

    /**
     * All Binding
     *
     * @var array
     */
    protected static $binding;

    /**
     * Setter
     *
     * @var string
     */
    protected static $setter;

    /**
     * @throws Exception
     */
    private function __construct()
    {
        if(!self::$connection){
            $db_data = require_once( ROOT . "/config/database.php");
            extract($db_data);

            $options = [
                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_OBJ,
                PDO::ATTR_PERSISTENT            => false,
                PDO::MYSQL_ATTR_INIT_COMMAND    => "set NAMES " . $charset . " COLLATE " . $collation,
            ];
            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$database;charset=$charset", $username, $password, $options);
            } catch (PDOException $exception){
                throw new Exception($exception->getMessage());
            }
        }
    }

    /**
     * Making our class as singleton instance
     * @return object
     */
    public static function instance() : object
    {
        if( !isset(self::$instance) ) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public static function query($query = null): object
    {
        self::instance();
        if ($query == null){
            if (!self::$table){
                throw new PDOException(self::$table . " Table not found in your Database");
            }

            $query = "SELECT ";
            $query .= self::$select ?: "*";
            $query .= " FROM ". static::$table . " ";
            $query .= self::$join . " ";
            $query .= self::$where . " ";
            $query .= self::$group_by. " ";
            $query .= self::$having. " ";
            $query .= self::$order_by. " ";
            $query .= self::$limit. " ";
            $query .= self::$offset. " ";
        }

        self::$query = $query;
        self::$binding = array_merge(self::$having_binding, self::$where_binding);

        return self::instance();
    }

    /**
     * Select data from table
     *
     * @return object instance
     */
    public static function select(): object
    {
        $select = func_get_args();
        $select = implode(", ", $select);

        self::$select = $select;

        return self::instance();
    }

    /**
     * Define data table
     *
     * @param string $table
     * @return object
     */
    public static function table(string $table): object
    {
        self::$table = $table;
        return self::instance();
    }

    /**
     * Build Join query
     * @param string $table
     * @param string $firstCondition
     * @param string $CompareOperator
     * @param string $secondCondition
     * @param string $joinType
     * @return object
     */
    public static function join(string $table, string $firstCondition, string $CompareOperator, string $secondCondition, $joinType = "INNER"): object
    {
        self::$join .= " " . $joinType . " JOIN " . $table . " ON ". $firstCondition . $CompareOperator . $secondCondition . " ";
        return self::instance();
    }

    /**
     * Right Join table
     *
     * @param string $table
     * @param string $firstCondition
     * @param string $CompareOperator
     * @param string $secondCondition
     * @return object
     */
    public static function rightJoin(string $table, string $firstCondition, string $CompareOperator, string $secondCondition): object
    {
        self::join($table, $firstCondition, $CompareOperator, $secondCondition, "RIGHT");
        return self::instance();
    }

    /**
     * Left Join table
     *
     * @param string $table
     * @param string $firstCondition
     * @param string $CompareOperator
     * @param string $secondCondition
     * @return object
     */
    public static function leftJoin(string $table, string $firstCondition, string $CompareOperator, string $secondCondition): object
    {
        self::join($table, $firstCondition, $CompareOperator, $secondCondition, "LEFT");
        return self::instance();
    }

    /**
     * Where condition
     *
     * @param string $column
     * @param string $compareOperator
     * @param string|int $value
     * @param string|null $type
     * @return object
     */
    public static function where(string $column, string $compareOperator, string|int $value, string $type = null): object
    {
        $where = "`" . $column . "`" . $compareOperator . " ? ";
        if (!self::$where){
            $statement = " WHERE " . $where;
        } else {
            if ($type == null){
                $statement = " AND " . $where;
            } else {
                $statement = " " . $type . " " . $where;
            }
        }

        self::$where .= $statement;
        self::$where_binding[] = htmlspecialchars($value);

        return self::instance();
    }

    /**
     * OrWhere condition
     * @param string $column
     * @param string $compareOperator
     * @param string|int $value
     * @return object
     */
    public static function orWhere(string $column, string $compareOperator, string|int $value) : object
    {
        self::where($column, $compareOperator, $value, "OR");
        return self::instance();
    }

    /**
     * Group by
     *
     * @return object
     */
    public static function groupBy()
    {
        $group_by = func_get_args();
        $group_by = "GROUP BY ". implode(", ", $group_by). " ";
        self::$group_by = $group_by;

        return self::instance();
    }

    /**
     * Where condition
     *
     * @param string $column
     * @param string $compareOperator
     * @param string|int $value
     * @return object
     */
    public static function having(string $column, string $compareOperator, string|int $value): object
    {
        $having = "`" . $column . "`" . $compareOperator . " ? ";
        if (!self::$having){
            $statement = " HAVING " . $having;
        } else {
            $statement = " AND " . $having;
        }

        self::$having .= $statement;
        self::$having_binding[] = htmlspecialchars($value);

        return self::instance();
    }

    /**
     * Order By Value
     *
     * @param string $column
     * @param string|null $type
     * @return object
     */
    public static function orderBy(string $column, string $type = null) : object
    {
        $sep = self::$order_by ? ' , ' : " ORDER BY ";
        $type = ($type != null && in_array($type, ["asc", "desc"])) ? strtoupper($type) : "ASC";
        $statement = $sep . $column . " " . $type . " ";

        self::$order_by .= $statement;
        return self::instance();
    }


    /**
     * Limit
     * @param int $limit
     * @return object
     */
    public static function limit(int $limit): object
    {
        self::$limit = "LIMIT " . $limit . " ";
        return self::instance();
    }

    /**
     * Offset
     * @param int $offset
     * @return object
     */
    public static function offset(int $offset): object
    {
        self::$offset = "OFFSET " . $offset . " ";
        return self::instance();
    }

    /**
     * @return false|\PDOStatement
     */
    public static function fetchExecute()
    {
        self::query(self::$query);
        $query = trim(self::$query, " ");
        $data = self::$connection->prepare($query);
        $data->execute(self::$binding);

        self::clear();
        return $data;
    }


    /**
     * Get records
     *
     * @return array|false
     */
    public static function get() : array|false
    {
        $data = self::fetchExecute();
        return $data->fetchAll();
    }

    /**
     * Get record
     *
     * @return array|false
     */
    public static function first() : array|false
    {
        $data = self::fetchExecute();
        return $data->fetch();
    }

    /**
     * Execute Insert query
     *
     * @param array $data
     * @param $query
     * @param $where
     * @return void
     */
    public static function execute(array $data, $query, $where = null): void
    {
        self::instance();
        if (!self::$table){
            throw new PDOException("Base table ". self::$table . " Not found");
        }

        foreach ($data as $key => $value){
            self::$setter .= "`" . $key . "` = ?, ";
            self::$binding[] = filter_var($value, FILTER_SANITIZE_STRING);
        }

        self::$setter = trim(self::$setter, ', ');

        $query .= self::$setter;
        $query .= $where != null ? self::$where . " " : "";

        self::$binding = ($where != null ) ? array_merge(self::$binding, self::$where_binding) : self::$binding;

        $data = self::$connection->prepare($query);
        $data->execute(self::$binding);
        self::clear();
    }

    /**
     * Insert records
     *
     * @param array $data
     * @return array|false
     */
    public static function insert(array $data)
    {
        $table = self::$table;
        $query = "INSERT INTO " . $table . " SET ";
        self::execute($data, $query);

        $lastInsertId = self::$connection->lastInsertId();
        return self::table($table)->where("id", "=", $lastInsertId)->first();
    }

    /**
     * Update record
     *
     * @param array $data
     * @return true
     */
    public static function update(array $data) : bool
    {
        $query = "UPDATE " . self::$table . " SET ";
        self::execute($data, $query, true);
        return true;
    }

    /**
     * Delete record
     *
     * @return bool
     */
    public static function delete() : bool
    {
        $query = "DELETE " . self::$table . " ";
        self::execute([], $query, true);
        return true;
    }

    public static function paginate(int $itemPerPage = 15)
    {
        self::query(self::$query);
        $query = trim(self::$query, " ");
        $data = self::$connection->prepare($query);
        $data->execute();
        $pages = ceil($data->rowCount() / $itemPerPage);

        $page = Request::get("page");

        $currentPage = (!is_numeric($page) ||  Request::get("page") < 1) ? "1" : $page;
        $offset = ($currentPage - 1) * $itemPerPage;
        self::limit($itemPerPage);
        self::offset($offset);
        self::query();

        $data = self::fetchExecute();
        $result = $data->fetchAll();

        return $response = [
            "data" => $result,
            "item_per_page" => $itemPerPage,
            "pages" => $pages,
            "current_page" => $currentPage
        ];
    }



    /**
     * Get the raw query
     *
     * @return string
     */
    public function getQuery(): string
    {
        self::query(self::$query);
        return self::$query;
    }

    public static function clear(): void
    {
        self::$select = '';
        self::$join = '';
        self::$where = "";
        self::$where_binding = [];
        self::$group_by = "";
        self::$having = "";
        self::$having_binding =[];
        self::$order_by = "";
        self::$limit = "";
        self::$offset = "";
        self::$binding = [];
        self::$instance = "";
    }
}