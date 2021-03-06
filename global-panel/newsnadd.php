<?php include '../classes/NewsAddN.php';?>
<?php include '../classes/CategoryNatioal.php';?>
<?php include '../classes/Districts.php';?>
<?php include '../classes/SubCategoryNational.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<script>
function getSubcat(val) {
    $.ajax({
    type: "POST",
    url: "get_subcat.php",
    data:'subcatid='+val,
    success: function(data){
        $("#subcategoy-list").html(data);
    }
    });
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

<?php
    $addN = new NewsAddN();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertNationNews = $addN->addNnews($_POST, $_FILES);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New News</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($insertNationNews)) {
                     echo $insertNationNews;
                 }
               ?></p>
                
               <div class="block copyblock"> 

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">

                         <tr>
                            <td>
                                <label>সারাদেশ সংবাদের জন্য[optional]</label>
                            </td>
                            <td>
                                <select name="district_id">
                                <?php
                                $dis = new Districts(); 
                                    $getdis = $dis->getAllDistricts();
                                    if ($getdis) {
                                        while ($disresult = $getdis->fetch_assoc()) {
                                ?>  
                                    <option value="<?php echo $disresult['district_id']; ?>">
                                        <?php echo $disresult['name']; ?>  
                                    </option>
                                <?php } } ?>    
                                </select>
                            </td>
                        </tr>
					

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select name="category_id" onChange="">
                                     <option value="">select Category</option>
                                <?php
                                $cat = new CategoryNatioal(); 
                                    $getcat = $cat->getAllNCat();
                                    if ($getcat) {
                                        while ($catres = $getcat->fetch_assoc()) {
                                ?>  
                                    <option value="<?php echo $catres['category_id']; ?>"><?php echo $catres['category_title']; ?></option>
                                <?php } } ?>    
                                </select>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Sub Category</label>
                            </td>
                            <td>
                                <select name="subcategory_id" id="subcategoy-list">
                                    <option value="">Select SubCategory</option>
                                    <?php
                                  $subcat = new SubCategoryNational(); 
                                    $getscat = $subcat->getAllNsCats();
                                    if ($getscat) {
                                        while ($subcatres = $getscat->fetch_assoc()) {
                                ?>  
                                    <option
                                         
                                        value="<?php echo $subcatres['subcategory_id']; ?>"><?php echo $subcatres['sub_category_title']; ?>
                                     </option>
                                <?php } } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label>Top News</label></td>
                            
                            <td>
                                 <select name="top_news">
                                    <option value="0">General</option>
                                    <option value="1">Top</option>
                                 </select>
                            </td>
                        </tr>


                         <tr>
                            <td>
                                <label>News Title</label>
                            </td>
                            <td>
                                <input type="text" name="news_title" placeholder="Enter News title" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>News Url</label></td>
                          
                            <td>
                                <input type="text" name="news_url" placeholder="Enter news url" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>SEO Title</label></td>
                            
                            <td>
                                <input type="text" name="news_seo_title" placeholder="Seo Title" class="medium">
                            </td>
                        </tr>

                        <tr>
                            <td><label>Image</label></td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>

                         <tr>
                            <td><label>News Summery</label></td>
                            
                            <td>
                                <textarea class="tinymce" name="news_summery"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td><label>News Details</label></td>
                            
                            <td>
                                <textarea class="tinymce" name="news_details"></textarea>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Image Caption</label>
                            </td>
                            <td>
                                <input type="text" name="author" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>সাহিত্য লেখকের নাম [optional]</label>
                            </td>
                            <td>
                                <input type="text" name="sahittowriter" class="medium" placeholder="যদি সাহিত্য কলাম লিখতে চান তাহলে লেখকের নাম দিন।" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Writer Name</label>
                            </td>
                            <td>
                                <input type="text" name="writer" value="<?php echo Session::get('adminUser')?>" class="medium" />
                                <input type="hidden" name="admin_id" value="<?php echo Session::get('admin_id')?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td><label>Status</label></td>
                            
                            <td>
                                 <select name="status">
                                <!-- <option value="1">active</option> -->
                                <option value="0">in-active</option>
                            </select>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="date" name="date"  class="medium" />
                            </td>
                        </tr>

						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>

                    </table>
                    </form>
                </div>
            </div>
        </div>

<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php include 'inc/footer.php';?>