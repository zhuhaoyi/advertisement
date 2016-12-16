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
	public $water_pic;			//图片水印URL
	//上传初始化操作
	public function __construct($upload_file,$upload_Maxsize,$upload_ext,$thumb=1){
		$this->upload_file = $upload_file; //获取上传文件
		$this->upload_Maxsize = $upload_Maxsize; //设置上传文件大小
		$this->upload_ext = $upload_ext; //设置上传文件类型
		$this->upload_path = '../userfiles';
		$this->thumb=$thumb;		//默认开启缩略图功能   1 开启  0 关闭
		$this->width ='200';		//缩略图宽度
		$this->height='300';		//缩略图高度
		$this->iswater =1;          //默认关闭水印 0； 1代表文字水印 ；       2代表图片水印      
		$this->str_w = '256';          // 水印相对图片右下角偏移水平位置
		$this->str_h = '200';		//水印相对图片右下角偏移垂直位置
		$this->water_pic =''; //水印图片位置 放在upload 目录下
		$this->str = '';			//文字水印内容
	}
	//获取上传文件的基本信息
	public function get_file_info(){
		if(is_uploaded_file($_FILES[$this->upload_file]['tmp_name'])){
		$file_info = $_FILES[$this->upload_file];		
		//print_r($file_info);
		return $file_info;
		}
	}
	//获取上传文件类型
	public function get_ext(){
			$file_info = $this->get_file_info();
			$file_ext = $file_info['name'];
			$file_ext = explode(".", $file_ext);
			$file_ext = $file_ext[count($file_ext)-1];
			//echo $file_ext;
			return $file_ext;
	}
	//获取上传文件大小
	public function get_size(){
		$file_info = $this->get_file_info();
		$file_size = $file_info['size'];
		return $file_size;
	}
	//判断上传文件类型是否符合
	public function is_ext_ok(){
		$file_ext = $this->get_ext(); //上传文件类型
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
		$file_size = $file_size/1024/1024; //转换为MB
		if($file_size < $this->upload_Maxsize){
			$is_size_ok = 1;
		}
		else{
			echo "上传文件过大.<br>";
		}
		return $is_size_ok;
	}
	//判断上传文件目录是否存在
	public function is_path_exist(){
		if(is_dir($this->upload_path)){

		}else
		{
			mkdir($this->upload_path);
		}
		

	}
	//判断文件类型是file 还是image
	public function file_or_image(){
		//判断是否需要创建2级目录
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
	
	//根据当前日期创建子目录
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
	//获取图像高度 宽度信息
	public function get_img_wh($img_src){
		$arr = getimagesize($img_src);
		return $arr;
	}
	
	//获取图片ext
	public function get_picext($name){
		$img_ext = explode('.', $name);
		$img_ext = $img_ext[count($img_ext)-1];
		return $img_ext;
	}
	//获取原图格式info
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
				echo "格式不支持";
				break;
		}
		return $img;
	}
	//水印Code 文字水印
	public function texttff($name,$img_src){
		$img= $this->get_img_info($name, $img_src);
		$color = imagecolorallocate($img, 196, 0, 0);
	    //$this->str = "编者QQ:800009217"; //文字水印内容
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
				echo "格式不支持";
				break;
		}
			
	}
	//图片水印
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
				echo "格式不支持";
				break;
		}
			
	}
	
	/*
	 * 缩略图Code
	 */
	public function thumb_img($name,$img_src,$width,$height){
		$thumb = imagecreatetruecolor($width, $height);
		$thumb_bg = imagecolorallocate($thumb, 255, 255, 255);
		$img = $this->get_img_info($name, $img_src);
		$img_info = getimagesize($img_src);
		imagecopyresized($thumb, $img, 0, 0, 0, 0, $width, $height, $img_info[0], $img_info[1]);
		return $thumb;
	}
	
	//上传文件就绪
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
					//当为image时开启缩略图					
					if($dir_ext=='image'){
						$img_src='upload/images/'.date("Ymd").'/'.$name;
						$_SESSION['img'] = $img_src;						
						//判断是否开启文字水印
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
							echo "图片文件上传成功并生成缩略图";
							}
					}else{
						$_SESSION['upload'] = $dir_path.'/'.$name;
							echo "文件上传成功";
					}

				}
				else{
					echo "文件上传失败";
				}

			}
			else{
				echo "上传文件格式不支持上传失败";
			}
		
		}
		else{
			//没有开启缩略图
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
					echo "文件上传失败";
				}
			}
			else{
				echo "上传文件格式不支持上传失败";
			}
		}			
	}

}

?>