<?php
/**
 * $Id: exif.class.php 411 2012-10-11 06:51:29Z lingter@gmail.com $
 * 
 * Exif lib: get image exif infos
 *      
 * @author : Lingter
 * @support : http://www.meiu.cn
 * @copyright : (c)2010 - 2011 meiu.cn lingter@gmail.com
 */
class exif_cla{
    
    function get_exif($file){
        if(!function_exists('exif_read_data')){
            return false;
        }
        $exif = @exif_read_data($file,"IFD0");
        if ($exif===false) {
            return false;
        }
        $exif_info = exif_read_data($file,NULL,true);
        $exif_arr = $this->supported_exif();
        $new_exif = array();
        
        foreach($exif_arr as $k=>$v){
            $arr = explode('.',$v);
            if(isset($exif_info[$arr[0]])){
                if(isset($exif_info[$arr[0]][$arr[1]])){
                    $new_exif[$k] = $exif_info[$arr[0]][$arr[1]];
                }else{
                    $new_exif[$k] = false;
                }
            }else{
                $new_exif[$k] = false;
            }
            if($k=='Software' && !empty($new_exif['Software'])){
                $new_exif['Software'] = preg_replace('/([^a-zA-Z0-9_\-,\.\:&#@!\(\)\s]+)/i','',$new_exif['Software']);
            }
        }
        return $new_exif;
    }
    
    function supported_exif(){
        return array(
            'Make' => 'IFD0.Make',
            'Model' => 'IFD0.Model',
            'ApertureFNumber' => 'COMPUTED.ApertureFNumber',
            'ExposureTime' => 'EXIF.ExposureTime',
            'Flash' => 'EXIF.Flash',
            'FocalLength' => 'EXIF.FocalLength',
            'FocalLengthIn35mmFilm' => 'EXIF.FocalLengthIn35mmFilm',
            'ISOSpeedRatings' => 'EXIF.ISOSpeedRatings',
            'WhiteBalance' => 'EXIF.WhiteBalance',
            'ExposureBiasValue' => 'EXIF.ExposureBiasValue',
            'DateTimeOriginal' => 'EXIF.DateTimeOriginal',
            'FocusDistance' => 'COMPUTED.FocusDistance',
            'FileSize' => 'FILE.FileSize',
            'MimeType' => 'FILE.MimeType',
            'Width' => 'COMPUTED.Width',
            'Height' => 'COMPUTED.Height',
            'Orientation' => 'IFD0.Orientation',
            'XResolution' => 'IFD0.XResolution',
            'YResolution' => 'IFD0.YResolution',
            'ResolutionUnit' => 'IFD0.ResolutionUnit',
            'Software' => 'IFD0.Software',
            'DateTime' => 'IFD0.DateTime',
            'Artist' => 'IFD0.Artist',
            'Copyright' => 'IFD0.Copyright',
            'MaxApertureValue' => 'EXIF.MaxApertureValue',
            'FNumber' => 'EXIF.FNumber',
            'MeteringMode' => 'EXIF.MeteringMode',
            'LightSource' => 'EXIF.LightSource',
            'ColorSpace' => 'EXIF.ColorSpace',
            'ExposureMode' => 'EXIF.ExposureMode',
            'ExposureProgram' => 'EXIF.ExposureProgram',
            'DateTimeDigitized' => 'EXIF.DateTimeDigitized',
            'GPSLatitude' => 'GPS.GPSLatitude',
            'GPSLongitude' => 'GPS.GPSLongitude',
            'GPSLatitudeRef' => 'GPS.GPSLatitudeRef',
            'GPSLongitudeRef' => 'GPS.GPSLongitudeRef'
        );
    }
    function parse_exif($infos){
        if(!$infos['Make'] && !$infos['Model']){
            return false;
        }

        $ExposureProgram = array(lang("not_defined"), lang('manual'), lang('standard_procedure'), lang('aperture_priority'), lang('shutter_priority'), lang('depth_priority'),lang('sport_mode'), lang('portrait_mode'),lang('landscape_mode'));
        $Orientation = array("", lang('top_left'), lang('top_right'), lang('bottom_right'), lang('bottom_left'), lang('left_top'), lang('right_top'), lang('right_bottom'), lang('left_bottom'));
        $ResolutionUnit = array("", "", lang('in-ch'),lang('cm'));
        $MeteringMode_arr = array(
            "0" => lang('unkown'),
            "1" => lang('avg'),                    
            "2" => lang('center_weighted_average'),
            "3" => lang('point_measurement'),      
            "4" => lang('zoning'),                 
            "5" => lang('assess'),                 
            "6" => lang('portion'),                
            "255" => lang('others')
            );
        $Lightsource_arr = array(
            "0" => lang('unkown'),
            "1" => lang('sun_light'),
            "2" => lang('fluorescent'),
            "3" => lang('tungsten'),
            "10" =>lang('flash_lamp'),
            "17" =>lang('standard_lighting_A'),
            "18" =>lang('standard_lighting_B'),
            "19" =>lang('standard_lighting_C'),
            "20" =>lang('d55'),
            "21" =>lang('d65'),
            "22" =>lang('d75'),
            "255" => lang('others')
            );
        $Flash_arr = array(
            0x00 => lang('close'),
            0x01 => lang('open'),
            0x05 => lang('open1'),
            0x07 => lang('open2'),
            0x09 => lang('open3'),
            0x0D => lang('open4'),
            0x0F => lang('open5'),
            0x10 => lang('open6'),
            0x18 => lang('close1'),
            0x19 => lang('open7'),
            0x1D => lang('open8'),
            0x1F => lang('open9'),
            0x20 => lang('no_flash'),
            0x41 => lang('open10'),
            0x45 => lang('open11'),
            0x47 => lang('open12'),
            0x49 => lang('open13'),
            0x4D => lang('open14'),
            0x4F => lang('open15'),
            0x59 => lang('open16'),
            0x5D => lang('open17'),
            0x5F => lang('open18')
        );
        if(is_array($infos)){
        $new_img_info = array();
        foreach($infos as $k=>$info){
            if($info===false){
                continue;
            }
            switch($k){
                case 'Flash':
                    $new_img_info[$k] = isset($Flash_arr[$info])?$Flash_arr[$info]:lang('unkown');
                    break;
                case 'FileSize':
                    $new_img_info[$k] = bytes2u($info);
                    break;
                case 'FocalLength':
                    $new_img_info[$k] = $info.'mm';
                    break;
                case 'FocalLengthIn35mmFilm':
                    $new_img_info[$k] = $info.'mm';
                    break;
                case 'FocusDistance':
                    $new_img_info[$k] = $info.'m';
                    break;
                case 'WhiteBalance':
                    $new_img_info[$k] = $info?lang('manual'):lang('auto');
                    break;
                case 'ExposureBiasValue':
                    $new_img_info[$k] = $info.'EV';
                    break;
                case 'Orientation':
                    $new_img_info[$k] = $Orientation[$info];
                    break;
                case 'XResolution':
                    $new_img_info[$k] = $info.$ResolutionUnit[$infos["ResolutionUnit"]];
                    break;
                case 'YResolution':
                    $new_img_info[$k] = $info.$ResolutionUnit[$infos["ResolutionUnit"]];
                    break;
                case 'MaxApertureValue':
                    $new_img_info[$k] = 'F'.$info;
                    break;
                case 'MeteringMode':
                    $new_img_info[$k] = isset($MeteringMode_arr[$info])?$MeteringMode_arr[$info]:lang('unkown');
                    break;
                case 'LightSource':
                    $new_img_info[$k] = isset($Lightsource_arr[$info])?$Lightsource_arr[$info]:lang('unkown');
                    break;
                case 'ColorSpace':
                    $new_img_info[$k] = $info==1?"sRGB":"Uncalibrated";
                    break;
                case 'ExposureMode':
                    $new_img_info[$k] = $info?lang('manual'):lang('auto');
                    break;
                case 'ExposureProgram':
                    $new_img_info[$k] = isset($ExposureProgram[$info])?$ExposureProgram[$info]:lang('unkown');
                    break;
                case 'GPSLatitude':
                    $dgree = getGps($info);
                    $new_img_info[$k] = (isset($infos["GPSLatitudeRef"])?$infos["GPSLatitudeRef"].' ':'').dgreeToNum($dgree);
                    break;
                case 'GPSLongitude':
                    $dgree = getGps($info);
                    $new_img_info[$k] = (isset($infos["GPSLongitudeRef"])?$infos["GPSLongitudeRef"].' ':'').dgreeToNum($dgree);
                    break;
                case 'GPSLatitudeRef':
                    continue;
                    break;
                case 'GPSLongitudeRef':
                    continue;
                    break;
                default:
                    $new_img_info[$k] = $info;
            }
        }
        }
        unset($new_img_info['ResolutionUnit']);
        return $new_img_info;
    }
}

//Pass in GPS.GPSLatitude or GPS.GPSLongitude or something in that format 
function getGps($exifCoord) 
{
  $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0; 
  $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0; 
  $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0; 
  
  //normalize 
  $minutes += 60 * ($degrees - floor($degrees)); 
  $degrees = floor($degrees); 
  
  $seconds += 60 * ($minutes - floor($minutes)); 
  $minutes = floor($minutes); 
  
  //extra normalization, probably not necessary unless you get weird data 
  if($seconds >= 60) 
  { 
    $minutes += floor($seconds/60.0); 
    $seconds -= 60*floor($seconds/60.0); 
  } 
  
  if($minutes >= 60) 
  { 
    $degrees += floor($minutes/60.0); 
    $minutes -= 60*floor($minutes/60.0); 
  } 
  
  return array('degrees' => $degrees, 'minutes' => $minutes, 'seconds' => $seconds); 
} 
  
function gps2Num($coordPart) { 
  $parts = explode('/', $coordPart); 
  
  if(count($parts) <= 0) 
    return 0; 
  if(count($parts) == 1) 
    return $parts[0]; 
  
  return floatval($parts[0]) / floatval($parts[1]); 
}
function dgreeToNum($d){
    $num = $d['degrees'] + ($d['minutes']+$d['seconds']/60)/60;
    return round($num,8);
}