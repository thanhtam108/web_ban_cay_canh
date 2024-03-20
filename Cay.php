<?php

global $connect;
class Cay
{

    var $tree_id; //id cây
    var $tree_name; // tên cây
    var $tree_category; // loại cây
    var $tree_height; // chiều cao cây
    var $tree_location; // nơi trồng cây
    var $tree_care; // cách chăm sóc cây
    var $tree_blossom_season; // mùa cây nở hoa
    var $tree_pic; // hình ảnh cây
    var $tree_price; // giá cây

    function get_tree_id()
    {
        return $this->tree_id;
    }

    function get_tree_name()
    {
        return $this->tree_name;
    }

    function get_tree_cate()
    {
        return $this->tree_category;
    }

    function get_tree_height()
    {
        return $this->tree_height;
    }

    function get_tree_location()
    {
        return $this->tree_location;
    }

    function get_tree_care()
    {
        return $this->tree_care;
    }

    function get_tree_bls_sns()
    {
        return $this->tree_blossom_season;
    }

    function get_tree_pic()
    {
        return $this->tree_pic;
    }

    function get_tree_price()
    {
        return $this->tree_price;
    }

    function copy_Cay($id, $name, $cate, $height, $location, $care, $bls_sns, $pic, $price)
    {
        $this->tree_id = $id;
        $this->tree_name = $name;
        $this->tree_category = $cate;
        $this->tree_height = $height;
        $this->tree_location = $location;
        $this->tree_care = $care;
        $this->tree_blossom_season = $bls_sns;
        $this->tree_pic = $pic;
        $this->tree_price = $price;
    }
    function __construct()
    {
        $this->tree_id = "";
        $this->tree_name = "";
        $this->tree_category = "";
        $this->tree_height = "";
        $this->tree_location = "";
        $this->tree_care = "";
        $this->tree_blossom_season = "";
        $this->tree_pic = "";
        $this->tree_price = "";
    }

    function ketNoi_MySQL()
    {
        global $connect;
        if (!$connect) {
            $connect = mysqli_connect("localhost", "root", "", "treesDB");
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            mysqli_set_charset($connect, "UTF8");
        }
    }

    function ngatKetNoi_MySQL()
    {
        global $connect;
        if ($connect) {
            mysqli_close($connect);
        }
    }

    function danhSach_Cay()
    {
        global $connect;

        $this->ketNoi_MySQL();

        $lenh_sql = "SELECT * FROM t_tree ";

        $query = mysqli_query($connect, $lenh_sql);

        $result = array();

        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }

        return $result;
    }

    function danhSach_Loai()
    {
        global $connect;

        $this->ketNoi_MySQL();

        $lenh_sql = "SELECT * FROM t_category";

        $query = mysqli_query($connect, $lenh_sql);

        $result = array();

        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }

        return $result;
    }
    
    function lay_Cay($ten)
    {
        global $connect;

        $this->ketNoi_MySQL();

        $lenh_sql = "SELECT t1.*, t2.CATE_NAME 
                 FROM t_tree t1
                 LEFT JOIN t_category t2 ON t1.CATE_ID = t2.CATE_ID
                 WHERE LOWER(t1.TREE_NAME) = LOWER('$ten')";

        $query = mysqli_query($connect, $lenh_sql);

        $list_tree = array(); 
        if (!$query) {
            die("Query failed: " . mysqli_error($connect));
        }
    
        $list_tree = array(); 
        while ($row = mysqli_fetch_assoc($query)) {
            $list_tree[] = $row;
        }

        return $list_tree;
    }

    function them_Cay($tree_name, $cate_id, $tree_height, $tree_location, $tree_care, $tree_blossom_season, $tree_pic, $tree_price)
    {
        global $connect;

        $this->ketNoi_MySQL();

        $tree_name = mysqli_real_escape_string($connect, $tree_name);
        $tree_cate_name = mysqli_real_escape_string($connect, $cate_id);
        $tree_height = mysqli_real_escape_string($connect, $tree_height);
        $tree_location = mysqli_real_escape_string($connect, $tree_location);
        $tree_care = mysqli_real_escape_string($connect, $tree_care);
        $tree_blossom_season = mysqli_real_escape_string($connect, $tree_blossom_season);
        $tree_pic = mysqli_real_escape_string($connect, $tree_pic);
        $tree_price = mysqli_real_escape_string($connect, $tree_price);

        $lenh_sql_check = "SELECT * FROM t_tree WHERE tree_name = '$tree_name'";

        $query_check = mysqli_query($connect, $lenh_sql_check);

        if (mysqli_num_rows($query_check) > 0) {
            echo "Cây đã tồn tại! Hãy thử lại!";
            return;
        } else {
                $sql_them = "INSERT INTO t_tree (tree_name, cate_id, tree_height, tree_location, tree_care, tree_blossom_season, tree_pic, tree_price) 
                        VALUES ('$tree_name','$cate_id','$tree_height','$tree_location','$tree_care','$tree_blossom_season','$tree_pic','$tree_price')";

                $query_them = mysqli_query($connect, $sql_them);

                echo "Đã thêm cây $tree_name thành công!";
            }

    }
    function sua_Cay($tree_id, $tree_height, $tree_location, $tree_care, $tree_price)
    {
        global $connect;

        $this->ketNoi_MySQL();

        $lenh_sql_check = "SELECT * FROM t_tree WHERE tree_id = '$tree_id'";
        $query_check = mysqli_query($connect, $lenh_sql_check);

        if (mysqli_num_rows($query_check) > 0) {
            $tree_height = mysqli_real_escape_string($connect, $tree_height);
            $tree_location = mysqli_real_escape_string($connect, $tree_location);
            $tree_care = mysqli_real_escape_string($connect, $tree_care);
            $tree_price = mysqli_real_escape_string($connect, $tree_price);

            $sql_update = "UPDATE t_tree 
                        SET Tree_Height = '$tree_height', 
                            Tree_Location = '$tree_location', 
                            Tree_Care = '$tree_care', 
                            Tree_Price = '$tree_price'
                        WHERE Tree_ID = '$tree_id'";

            $query_update = mysqli_query($connect, $sql_update);

            if ($query_update) {
                echo "Đã sửa thông tin cây thành công!";
            } else {
                echo "Lỗi khi cập nhật thông tin cây!";
            }
        } else {
            echo "Cây không tồn tại! Hãy thử lại!";
        }
    }

    function xoa_Cay($tree_id)
    {
        global $connect;

        $this->ketNoi_MySQL();

        $lenh_sql_check = "SELECT * FROM t_tree WHERE tree_id = '$tree_id'";

        $query_check = mysqli_query($connect, $lenh_sql_check);

        if (mysqli_num_rows($query_check) > 0) {
            $row = mysqli_fetch_assoc($query_check);
            $tree_name = $row['TREE_NAME'];
            $sql_xoa = "DELETE FROM t_tree WHERE tree_id = '$tree_id' ";
            mysqli_query($connect, $sql_xoa);
            echo "Đã xoá thành công cây $tree_name!";
        } else {
            echo "Cây không tồn tại! Hãy thử lại!";
        }
    }
}

$connect = null; 

?>