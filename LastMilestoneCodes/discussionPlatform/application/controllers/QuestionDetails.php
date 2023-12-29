<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class questionDetails extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

    //When user click on the link, it will lead to the details of the question 
    public function showRelatedInfo($info,$user=" ",$checkPin=" "){
        $this->session->set_userdata('currentQID',$info);
        $this->load->model('GrabClickedQDetails_model');
        $this->load->model('LoadReplyForQuestion_model');
        $this->load->model('AttachFilesToCResponse_model');
        $this->load->helper('form');
		$this->load->helper('url');
        $data['qid']=$info;
        $qInfo["info"] = $this->GrabClickedQDetails_model->getTheInfo($info);
        $qInfo["response"] = $this->LoadReplyForQuestion_model->grabReply($_SESSION['currentQID']);
        $qInfo["error"]="";
        $qInfo["testing"]="";
        $qInfo["join"]=$this->AttachFilesToCResponse_model->joinDataResult($info);
        $qInfo["currentUser"]= $_SESSION['username'];
        $qInfo["questionID"]=$info;
        $this->load->model('GiveLikeQuestions_Model');
        if($info!=" " and $user!=" " and $checkPin==" "){
            //when $user!="", it means the reqirement not come from the link in mainScreen.php, but it comes from the like button in detailedtoQuestion, it means the button is hitted
            //if it is 0, change to 1, if it is 1 change to 0
            //Perform this operation in the model. 
            //if request comes from the link in the mainScreen.php, this block won't execute as $user will be "". 
            $likeStatusValue = $this->GiveLikeQuestions_Model->grabLikeButtonText($user,$info);
            $numericalLikeStatusValue=$likeStatusValue->likeStatus;
            if($numericalLikeStatusValue==0){

                $this->GiveLikeQuestions_Model->changeLikeStatusToOne($user,$info);


            }
            if($numericalLikeStatusValue==1){

                $this->GiveLikeQuestions_Model->changeLikeStatusToZero($user,$info);
                

            }




        }
        $this->load->model('PinStatusChange_Model');
        if($info!=" " and $user!=" " and $checkPin!=" "){
            //$this->PinStatusChange_Model->pinChange($user,$info);
            $pinCurrentValue = $this->PinStatusChange_Model->getPinText($user,$info);
            if($pinCurrentValue==0){
                $this->PinStatusChange_Model->pinChangeToOne($_SESSION['username'],$info);

            }
            if($pinCurrentValue==1){
                $this->PinStatusChange_Model->pinChangeToZero($user,$info);

            }



        }
        $likeStatus =$this->GiveLikeQuestions_Model->grabLikeButtonText($_SESSION['username'],$info);
        $numericalLikeValue = $likeStatus->likeStatus;
        $textValue='';
        if($numericalLikeValue==0){
            $textValue='Like';

        }
        if($numericalLikeValue==1){
            $textValue='Unlike';
        }
        $qInfo['LikeButtonText']=$textValue;
        //$question = qInfo["question"]
        $numberOfLikes = $this->GiveLikeQuestions_Model->getAllTheCurrentLikes($info);
        $qInfo['amountOfLikes']=$numberOfLikes;
        $thePinText=$this->PinStatusChange_Model->getPinText($_SESSION['username'],$info);
        if($thePinText==0){
            $qInfo['pinText']='Pin';

        }
        if($thePinText==1){
            $qInfo['pinText']='Unpin';

        }
        $this->load->view('template/header');
        $this->load->view('DetailedInfoQuestion',$qInfo);
        $this->load->view('template/footer');

    }

    //when you try to reply a question, it will jump to this function 
    public function replyQuestion(){
        $this->load->helper('form');
		$this->load->helper('url');
        $this->load->model('GrabClickedQDetails_model');
        $this->load->model('ReplyQuestionAddToDB_model');
        $this->load->model('LoadReplyForQuestion_model');
        $this->load->model('UploadFile_model');
        $this->load->model('AttachFilesToCResponse_model');
        $this->load->model('GiveLikeQuestions_Model');
        $this->load->model('PinStatusChange_Model');


        


       

        $responseContents = $this->input->post('reply');
        $questionID = $_SESSION['currentQID'];
        $responseUser = $_SESSION['username'];
        $responseInfo["response"]=$responseContents;
        $responseInfo["questionID"]=$questionID;
        $responseInfo["responseUserName"]=$responseUser;
        //The following codes is grabbing the addReplyToDB method from ReplyQuestionAddToDB_model. The purpose of this code is to insert response data to the DB
       // $this->ReplyQuestionAddToDB_model->addReplyToDB($responseInfo);


       //This block is to check if the input text field is empty or not, if it is empty, it will exexute the if block. Otherwise, if it is not empty, it will exexute the else block
       if ($_FILES['userFileUpload']['size']==0)
        {
            $this->ReplyQuestionAddToDB_model->addReplyToDB($responseInfo);
            // upload is empty (and not an error)
                //The following codes is to make the array. The array includes all the data which will be used in the DetailedInfoQuestion view in the later stage.
        $qInfo["info"] = $this->GrabClickedQDetails_model->getTheInfo($questionID);
        $qInfo["response"] = $this->LoadReplyForQuestion_model->grabReply($questionID);
        $qInfo["error"]="";
        $qInfo["testing"]="You'didn't upload file, so no file to upload, but your text response is recorded.";
        $qInfo["join"]=$this->AttachFilesToCResponse_model->joinDataResult($questionID);
        $qInfo["questionID"]=$questionID;
        $qInfo["currentUser"]=$responseUser;
        //get the like button text 
        $likeStatus =$this->GiveLikeQuestions_Model->grabLikeButtonText($_SESSION['username'],$questionID);
        $numericalLikeValue = $likeStatus->likeStatus;
        $textValue='';
        if($numericalLikeValue==0){
            $textValue='Like';

        }
        if($numericalLikeValue==1){
            $textValue='Unlike';
        }
        $qInfo['LikeButtonText']=$textValue;


        //get amount of likes 
        $numberOfLikes = $this->GiveLikeQuestions_Model->getAllTheCurrentLikes($questionID);
        $qInfo['amountOfLikes']=$numberOfLikes;


        //pincheck 
        $qInfo['pinCheck']='True';


        //pinText 
        $thePinText=$this->PinStatusChange_Model->getPinText($_SESSION['username'],$questionID);
        if($thePinText==0){
            $qInfo['pinText']='Pin';

        }
        if($thePinText==1){
            $qInfo['pinText']='Unpin';

        }

        




        //$getQuestionData =$this->GrabClickedQDetails_model->getTheInfo($questionID);
        //$getResponseData = $this->LoadReplyForQuestion_model->grabReply($questionID);
        //$data[] = array($catagory => $question);
        //$qInfo = array("response"=>$getResponseData);
        $this->load->view('template/header');
        $this->load->view('DetailedInfoQuestion',$qInfo);
        $this->load->view('template/footer');







        }

        if($_FILES['userFileUpload']['size']>0){
            $config['upload_path'] = './uploads/';
            $config['allowed_types']='jpg|mp4|mkv|png';
            $config['max_size'] = 10000;
            $config['max_width'] =2000;
            $config['max_height']=1000;
            $this->load->library('upload',$config);
            

        //The following code is for the upload file 
        //If it falls into the if block, it means upload fail.
        //If it falls into the else block, it means file upload success 
        
            if(!$this->upload->do_upload('userFileUpload')){
                $qInfo["info"] = $this->GrabClickedQDetails_model->getTheInfo($questionID);
        $qInfo["response"] = $this->LoadReplyForQuestion_model->grabReply($questionID);
        $qInfo["error"]=$this->upload->display_errors();
        $qInfo["testing"]="You have selected something to upload, but it fails to upload to the database.Try again";
        $qInfo["join"]=$this->AttachFilesToCResponse_model->joinDataResult($questionID);


        //add all the missing key here
        $qInfo["questionID"]=$questionID;
        $qInfo["currentUser"]=$responseUser;
        //get the like button text 
        $likeStatus =$this->GiveLikeQuestions_Model->grabLikeButtonText($_SESSION['username'],$questionID);
        $numericalLikeValue = $likeStatus->likeStatus;
        $textValue='';
        if($numericalLikeValue==0){
            $textValue='Like';

        }
        if($numericalLikeValue==1){
            $textValue='Unlike';
        }
        $qInfo['LikeButtonText']=$textValue;


        //get amount of likes 
        $numberOfLikes = $this->GiveLikeQuestions_Model->getAllTheCurrentLikes($questionID);
        $qInfo['amountOfLikes']=$numberOfLikes;


        //pincheck 
        $qInfo['pinCheck']='True';


        //pinText 
        $thePinText=$this->PinStatusChange_Model->getPinText($_SESSION['username'],$questionID);
        if($thePinText==0){
            $qInfo['pinText']='Pin';

        }
        if($thePinText==1){
            $qInfo['pinText']='Unpin';

        }
        



                $this->load->view('template/header');
                $this->load->view('DetailedInfoQuestion',$qInfo);
                $this->load->view('template/footer');



                
            }else{
                $this->ReplyQuestionAddToDB_model->addReplyToDB($responseInfo);
                $theFileName =$this->upload->data('file_name');
                $thePath = $this->upload->data('full_path');
                $correspondingResponseID = $this->UploadFile_model->getResponseIDForReplyFiles();
                //$correspondingResponseIDValues =$correspondingResponseID["responseID"];
                $this->UploadFile_model->upload($theFileName,$thePath,$correspondingResponseID);
                $this->load->view('template/header');
                $qInfo["info"] = $this->GrabClickedQDetails_model->getTheInfo($questionID);
                $qInfo["response"] = $this->LoadReplyForQuestion_model->grabReply($questionID);
                $qInfo["error"]="File upload success.";
                $qInfo["testing"]="You have uploaded your selected file successfully";
                $qInfo["join"]=$this->AttachFilesToCResponse_model->joinDataResult($questionID);

                //add all the missing key to qinfo array 
                $qInfo["questionID"]=$questionID;
        $qInfo["currentUser"]=$responseUser;
        //get the like button text 
        $likeStatus =$this->GiveLikeQuestions_Model->grabLikeButtonText($_SESSION['username'],$questionID);
        $numericalLikeValue = $likeStatus->likeStatus;
        $textValue='';
        if($numericalLikeValue==0){
            $textValue='Like';

        }
        if($numericalLikeValue==1){
            $textValue='Unlike';
        }
        $qInfo['LikeButtonText']=$textValue;


        //get amount of likes 
        $numberOfLikes = $this->GiveLikeQuestions_Model->getAllTheCurrentLikes($questionID);
        $qInfo['amountOfLikes']=$numberOfLikes;


        //pincheck 
        $qInfo['pinCheck']='True';


        //pinText 
        $thePinText=$this->PinStatusChange_Model->getPinText($_SESSION['username'],$questionID);
        if($thePinText==0){
            $qInfo['pinText']='Pin';

        }
        if($thePinText==1){
            $qInfo['pinText']='Unpin';

        }


                


                $this->load->view('DetailedInfoQuestion',$qInfo);
                $this->load->view('template/footer');

                




            }

        }

    


        
    }


}