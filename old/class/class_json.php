<?php
session_start();
class upload{	
	public $upload_file;
	public $upload_Maxsize;
	public $upload_ext;
	public $upload_path;
	public $thumb;
	public $width;
	public $height;
	public $str;
	public $iswater;
	public $str_w;
	public $str_h;
	public $water_pic;			//ͼƬˮӡURL
	//�ϴ���ʼ������
	public function __construct($upload_file,$upload_Maxsize,$upload_ext,$thumb=1){
		$this->upload_file = $upload_file; //��ȡ�ϴ��ļ�
		$this->upload_Maxsize = $upload_Maxsize; //�����ϴ��ļ���С
		$this->upload_ext = $upload_ext; //�����ϴ��ļ�����
		$this->upload_path = '../userfiles';
		$this->thumb=$thumb;		//Ĭ�Ͽ�������ͼ����   1 ����  0 �ر�
		$this->width ='200';		//����ͼ���
		$this->height='300';		//����ͼ�߶�
		$this->iswater =1;          //Ĭ�Ϲر�ˮӡ 0�� 1��������ˮӡ ��       2����ͼƬˮӡ      
		$this->str_w = '256';          // ˮӡ���ͼƬ���½�ƫ��ˮƽλ��
		$this->str_h = '200';		//ˮӡ���ͼƬ���½�ƫ�ƴ�ֱλ��
		$this->water_pic =''; //ˮӡͼƬλ�� ����upload Ŀ¼��
		$this->str = '';			//����ˮӡ����
	}
	//��ȡ�ϴ��ļ��Ļ�����Ϣ
	public function get_file_info(){
		if(is_uploaded_file($_FILES[$this->upload_file]['tmp_name'])){
		$file_info = $_FILES[$this->upload_file];		
		//print_r($file_info);
		return $file_info;
		}
	}
	//��ȡ�ϴ��ļ�����
	public function get_ext(){
			$file_info = $this->get_file_info();
			$file_ext = $file_info['name'];
			$file_ext = explode(".", $file_ext);
			$file_ext = $file_ext[count($file_ext)-1];
			//echo $file_ext;
			return $file_ext;
	}
	//��ȡ�ϴ��ļ���С
	public function get_size(){
		$file_info = $this->get_file_info();
		$file_size = $file_info['size'];
		return $file_size;
	}
	//�ж��ϴ��ļ������Ƿ����
	public function is_ext_ok(){
		$file_ext = $this->get_ext(); //�ϴ��ļ�����
		foreach ($this->upload_ext as $key=>$val){
			if($val == $file_ext){
				//echo $val;
				$is_ext_ok = 1;
				break;
			}
		}
		return $is_ext_ok;		
	}
	public function is_size_ok(){
		$file_size = $this->get_size();
		$file_size = $file_size/1024/1024; //ת��ΪMB
		if($file_size < $this->upload_Maxsize){
			$is_size_ok = 1;
		}
		else{
			echo "�ϴ��ļ�����.<br>";
		}
		return $is_size_ok;
	}
	//�ж��ϴ��ļ�Ŀ¼�Ƿ����
	public function is_path_exist(){
		if(is_dir($this->upload_path)){

		}else
		{
			mkdir($this->upload_path);
		}
		

	}
	//�ж��ļ�������file ����image
	public function file_or_image(){
		//�ж��Ƿ���Ҫ����2��Ŀ¼
		$dir_ext = 0;
		$this->is_path_exist();
		$file_info = $this->get_file_info();
		$dir_ext = $file_info['type'];
		$dir_ext = explode("/", $dir_ext);
		$dir_ext = $dir_ext[0];		
		if($dir_ext=='image'){
			if(!is_dir($this->upload_path."/Images")){
			mkdir($this->upload_path."/Images");
			}
			$dir_ext = "Images";
		}else
		{
			if(!is_dir($this->upload_path."/Files")){
			mkdir($this->upload_path."/Files");
			}
			$dir_ext = "Files";
		}	
		return $dir_ext;	
	}
	
	//���ݵ�ǰ���ڴ�����Ŀ¼
	public function dir_bydate(){
		$date = date("Ymd");
		$folder_bydate =$this->file_or_image();
		if($folder_bydate=='Files'){
			if(!is_dir($this->upload_path.'/Files/'.$date)){
				$path = mkdir($this->upload_path.'/Files/'.$date);
				$path = $this->upload_path.'/Files/'.$date;
			}
			else{
				$path = $this->upload_path.'/Files/'.$date;
			}
		}
		else{
			if(!is_dir($this->upload_path.'/Images/'.$date)){
				$path = mkdir($this->upload_path.'/Images/'.$date);
				$path = $this->upload_path.'/Images/'.$date;
			}
			else {
				$path = $this->upload_path.'/Images/'.$date;
			}
		}
		$dir_path = dirname($path)."/".$date;
		return $dir_path;
	}
	//��ȡͼ��߶� �����Ϣ
	public function get_img_wh($img_src){
		$arr = getimagesize($img_src);
		return $arr;
	}
	
	//��ȡͼƬext
	public function get_picext($name){
		$img_ext = explode('.', $name);
		$img_ext = $img_ext[count($img_ext)-1];
		return $img_ext;
	}
	//��ȡԭͼ��ʽinfo
	public function get_img_info($name,$img_src){
		$img_ext = explode('.', $name);
		$img_ext = $img_ext[count($img_ext)-1];
		switch ($img_ext){
			case jpg:
				$img = imagecreatefromjpeg($img_src);
				break;
			case png:
				$img = imagecreatefrompng($img_src);
				break;
			case bmp:
				$img = imagecreatefromwbmp($img_src);
				break;
			case gif:
				$img = imagecreatefromgif($img_src);
				break;
			default: 
				echo "��ʽ��֧��";
				break;
		}
		return $img;
	}
	//ˮӡCode ����ˮӡ
	public function texttff($name,$img_src){
		$img= $this->get_img_info($name, $img_src);
		$color = imagecolorallocate($img, 196, 0, 0);
	    //$this->str = "����QQ:800009217"; //����ˮӡ����
	    $this->str = iconv("gbk", "utf-8", $this->str);
	    $arr = $this->get_img_wh($img_src);
	    $width = $arr[0]-$this->str_w;
	    $height = $arr[1]-$this->str_h;
	    imagettftext($img, 14, 1, $width,$height, $color, 'simkai.ttf', $this->str);    
		$ext = $this->get_picext($name);
		$save_path = 'upload/images/'.date("Ymd").'/water_'.date("Ymd").$name;
		$_SESSION['water'] = $save_path;
		switch ($ext){
			case jpg:
				imagejpeg($img,$save_path);
				break;
			case bmp:
				imagewbmp($img,$save_path);
				break;
			case png:
				imagepng($img,$save_path);
				break;
			case gif:
				imagegif($img,$save_path);
				break;
			default:
				echo "��ʽ��֧��";
				break;
		}
			
	}
	//ͼƬˮӡ
	public function water_use_img($name,$img_src){
		$img_water = $this->get_img_info($this->water_pic, $this->water_pic);
		$img = $this->get_img_info($name, $img_src);
		$arr = $this->get_img_wh($img_src);
		$width = $arr[0]-$this->str_w;
		$height = $arr[1]-$this->str_h;
		echo $width;
		echo $height;
		imagecopy($img, $img_water, $width, $height, 0, 0, "256", "256");
		$ext = $this->get_picext($name);
		$save_path = 'upload/images/'.date("Ymd").'/water_'.date("Ymd").$name;
		$_SESSION['water'] = $save_path;
			switch ($ext){
			case jpg:
				imagejpeg($img,$save_path);
				break;
			case bmp:
				imagewbmp($img,$save_path);
				break;
			case png:
				imagepng($img,$save_path);
				break;
			case gif:
				imagegif($img,$save_path);
				break;
			default:
				echo "��ʽ��֧��";
				break;
		}
			
	}
	
	/*
	 * ����ͼCode
	 */
	public function thumb_img($name,$img_src,$width,$height){
		$thumb = imagecreatetruecolor($width, $height);
		$thumb_bg = imagecolorallocate($thumb, 255, 255, 255);
		$img = $this->get_img_info($name, $img_src);
		$img_info = getimagesize($img_src);
		imagecopyresized($thumb, $img, 0, 0, 0, 0, $width, $height, $img_info[0], $img_info[1]);
		return $thumb;
	}
	
	//�ϴ��ļ�����
	public function canupload(){
		$dir_path = $this->dir_bydate();
		//echo $dir_path;
		$is_size_ok = $this->is_size_ok();
		$is_ext_ok = $this->is_ext_ok();
		$tmp = $this->get_file_info();
		$dir_ext = $tmp['type'];
		$name = $tmp['name'];
		$tmp =$tmp['tmp_name'];
		//echo $name;
		//echo $this->thumb;
		if($this->thumb){
			if($is_ext_ok){
				if($is_size_ok){
					move_uploaded_file($tmp, $dir_path.'/'.$name);
					$dir_ext = explode("/", $dir_ext);
					$dir_ext = $dir_ext[0];
					//��Ϊimageʱ��������ͼ					
					if($dir_ext=='image'){
						$img_src='upload/images/'.date("Ymd").'/'.$name;
						$_SESSION['img'] = $img_src;						
						//�ж��Ƿ�������ˮӡ
						if($this->iswater==1){
							$this->texttff($name,$img_src);
						}
						if($this->iswater==2){
							$this->water_use_img($name,$img_src);
						}
						
						$thumbsm = $this->thumb_img($name, $img_src, $this->width, $this->height);
						if($thumbsm){
							imagejpeg($thumbsm,'upload/images/'.date("Ymd").'/thumb_'.$name);
							$_SESSION['thumb'] = 'upload/images/'.date("Ymd").'/thumb_'.$name;
							echo "ͼƬ�ļ��ϴ��ɹ�����������ͼ";
							}
					}else{
						$_SESSION['upload'] = $dir_path.'/'.$name;
							echo "�ļ��ϴ��ɹ�";
					}

				}
				else{
					echo "�ļ��ϴ�ʧ��";
				}

			}
			else{
				echo "�ϴ��ļ���ʽ��֧���ϴ�ʧ��";
			}
		
		}
		else{
			//û�п�������ͼ
			if($is_ext_ok){
				if($is_size_ok){
					$img_exts = explode('.', $name);
					$img_exts = $img_exts[count($img_exts)-1];
					$straings=time().rand(1000,9999);
					move_uploaded_file($tmp, $dir_path.'/'.$straings.'.'.$img_exts);
					$_SESSION['upload'] = $dir_path.'/'.$straings.'.'.$img_exts;
					echo "<script language='javascript'>location.replace('uploads.php');</script>";
				}
				else{
					echo "�ļ��ϴ�ʧ��";
				}
			}
			else{
				echo "�ϴ��ļ���ʽ��֧���ϴ�ʧ��";
			}
		}			
	}

}

?>