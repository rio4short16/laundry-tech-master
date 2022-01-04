<?php
include "db_connect.php";
 try{
        $qry = $conn->query("SELECT * FROM laundry_list WHERE id =".$_POST['id']);
        $returnArr = array();
        $row = $qry -> fetch_array(MYSQLI_ASSOC);
        if($row){
            $returnArr[] = array(
                "first_name" => $row["first_name"],
                "last_name" => $row["last_name"],
                "customer_address" => $row["customer_address"],
                "contact" => $row["contact"],
                "status" => $row["status"],
                "queue" => $row["queue"],
                "total_amount" => $row["total_amount"],
                "pay_status" => $row["pay_status"],
                "amount_tendered" => $row["amount_tendered"],
                "amount_change" => $row["amount_change"],
                "remarks" => $row["remarks"],
                "washing_id" => $row["washing_id"],
                "date_created" => $row["date_created"],
            );
        }
    }catch (PDOException $e) {
        $returnArr[] = array(
            "error" => $e->getMessage()
        );
    } finally {
        // Encoding array in JSON format
        echo json_encode($returnArr);
    }
// if($_POST['action'] == 'info'){
   
// }else{
//     try{
//         $qry = $conn->query("
//         SELECT 
//         c.name AS 'name', i.weight AS 'weight', i.unit_price AS 'price', i.amount AS 'amount' 
//         FROM laundry_items AS i 
//         INNER JOIN laundry_categories AS c 
//         ON c.id = i.laundry_category_id 
//         WHERE i.laundry_id =".$_POST['id']." GROUP BY c.id ORDER BY c.id DESC");
//         $row = $qry -> fetch_array(MYSQLI_ASSOC);
//         $returnArr = array();
//         if($row){
//             $returnArr[] = array(
//                 "categoryName" => $row["name"],
//                 "weigth" => $row["weight"],
//                 "unitPrice" => $row["price"],
//                 "amount" => $row["amount"],
//             );
//         }
//     }catch (PDOException $e) {
//         $returnArr[] = array(
//             "error" => $e->getMessage()
//         );
//     } finally {
//         // Encoding array in JSON format
//         echo json_encode($returnArr)
//     }
// }

    