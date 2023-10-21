<?php

include_once "Db.php";

class Company extends Db {
    public function add_posts($company_id, $job_title, $job_description, $location, $salary, $requirements, $posting_date){ 
    }
    public function fetch_all_jobs(){
        //fetch all posts for admin
        $sql = "SELECT * FROM job_post";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $job_posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $job_posts;
    }

    //Job_posts method
    public function get_all_jobs($job_post_id){
        //fetch all posts for admin
        $sql = "SELECT * FROM job_post WHERE job_post_id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $job_post_id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->rowCount();

        if($count < 1){
            return false;
            exit();
        }else{
            $job_posts = $stmt->fetch();
            return $job_posts;
        }
    }

    //Update job_posts
    public function update_job_posts($job_post_id, $job_post_company_id, $job_title, $job_description, $job_level, $job_function, $location, $location_type, $salary, $requirements, $posting_date, $is_approve){
        $sql = "UPDATE job_posts SET job_post_company_id = ?, job_title = ?, job_description = ?, job_level = ?, job_function = ?, location = ?, location_type = ?, salary = ?, requirements = ?, posting_date = ?, is_approve = ? WHERE job_post_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $job_post_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $job_post_company_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $job_title, PDO::PARAM_INT);
        $stmt->bindParam(4, $job_description, PDO::PARAM_INT);
        $stmt->bindParam(5, $job_level, PDO::PARAM_INT);
        $stmt->bindParam(6, $job_function, PDO::PARAM_INT);
        $stmt->bindParam(7, $location, PDO::PARAM_INT);
        $stmt->bindParam(8, $location_type, PDO::PARAM_INT);
        $stmt->bindParam(9, $salary, PDO::PARAM_INT);
        $stmt->bindParam(10, $requirements, PDO::PARAM_INT);
        $stmt->bindParam(11, $posting_date, PDO::PARAM_INT);
        $stmt->bindParam(12, $is_approve, PDO::PARAM_INT);

        $updated = $stmt->execute();
        return $updated;
    }

    //method to delete jobs
    public function delete_book($job_post_id){
        $sql = "DELETE FROM job_posts WHERE job_post = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $job_post_id, PDO::PARAM_INT);
        $deleted = $stmt->execute();
        return $deleted;
    }

    public function upload_profile_image($company_id, $logo){
        $sql = "UPDATE company SET logo = ? WHERE company_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $company_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $logo, PDO::PARAM_STR);
        $response = $stmt->execute();
        if($response){
            return true;
        }else{
            return false;
        }
    }

    // $coy = new Company();
    // echo $coy->delete_job_posts();
    
}

?>