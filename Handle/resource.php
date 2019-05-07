<?php

class Resource
{

	public function dirToArray($oldName) 
	{
	
			$dir = str_replace(chr(92), chr(47), $oldName);
			$filelist = array();
			echo "<ul>";
					if($handle = opendir($dir)) {
						while($entry = readdir($handle)){
							if(!in_array($entry,array(".",".."))){
								$dir2 = $dir.'/'.$entry;
								if(is_dir($dir2))
								{

									echo '<li><i class="fas fa-folder"></i><a>'.$entry.'</a>
										</li>';
									

									$this->dirToArray($dir2);

								}
								else
								{
									echo '<li><i class="fas fa-file-alt"></i><a>'.$entry.'<a/>
									</li>';
									
								}

							}
						}
					}
					closedir($handle);	
					echo "</ul>"		;
		
	}
	
	public function changeNameFile($dirOld,$nameOld,$nameNew) {
		$dir = str_replace(chr(92), chr(47), $dirOld);
		if($handle = opendir($dir)) {
			while($entry = readdir($handle)){
		 		if(!in_array($entry,array(".",".."))){
					$dir2 = $dir.'/'.$entry;
					$newName = $dir.'/'.str_replace($nameOld, $nameNew, $entry);
					if(rename($dir2, $newName)) 
					{
						$dir2 = $newName;
						if(is_dir($dir2))
						{
							$this->changeNameFile($dir2,$nameOld, $nameNew);
						}
					}
				}
			}
		 }
		 closedir($handle);
	}

	public function deleteName($dirOld, $name) 
	{
		$dir = str_replace(chr(92), chr(47), $dirOld);
		if($handle = opendir($dir)){
			while($entry = readdir($handle)){
				if(!in_array($entry,array(".",".."))){
					$fullpath = $dir."/".$entry;
					if($name === $entry){
						$this->rmdir_recurse($fullpath);
					}
					else {
						echo "ok";
						if(is_dir($fullpath)){
							$this->deleteName($fullpath, $name);
						}
					}
				}
			}
		}
		closedir($handle);

	}
	public function rmdir_recurse($path) {
		  $path = rtrim($path, '/') . '/';
			  if($handle = opendir($path)){

				  while (false !== ($file = readdir($handle))) {
				    if($file != '.' and $file != '..' ) {
				      $fullpath = $path.$file;
				      if (is_dir($fullpath)){
				      	 $this->rmdir_recurse($fullpath);
				      }
				      else {
				      	unlink($fullpath);
				      }
				    }
				  }
				}
			  closedir($handle);
		  rmdir($path);
	}

}
