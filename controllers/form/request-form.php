<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var input1 = document.getElementById('searchTextField1');
	  var autocomplete = new google.maps.places.Autocomplete(input);
      var autocomplete = new google.maps.places.Autocomplete(input1);
   }
   google.maps.event.addDomListener(window, 'load', initialize);
</script>


<form method="post" id="createRequestForm" action="classes/request-item.php" enctype="multipart/form-data">
	<div class="col-xs-12 col-sm-6" id="section1">
		<br>
		<h4>Item <span class="subtext"><i class="fa fa-chevron-circle-right"></i> </span></h4><br>
		<div class="form-group">
		    <label>Item name</label>
		    <input class="form-control" id="itemName" name="itemName" maxlength="50" placeholder="What do you want to buy?">
		</div>
		<div class="form-group">
		    <label>Item description</label>
		    <textarea class="form-control" rows="5" style="resize:none" id="itemDescription" name="itemDescription" maxlength="500"
		    placeholder="Describe your item e.g. size, quantity, colour, packaging, how to buy">
		    </textarea>
		</div>
		<div class="form-group">
		    <label>Category</label>
			<select class="form-control" id="category" name="category">
				<option value="" disabled selected>Select from list</option>
				<option value="nice">nice</option>
			</select>
		</div>

		<input type="hidden" name="parentRequestId" value="0"><input type="hidden" name="parentRecommendationId" value="0">						
		
		<!-- <div class="form-group">
				<label>Upload a picture</label>				
				<input type="file" name="file" id="file">
		</div> -->

		<div class="form-group float-label-control">
            <label for="">Upload Picture</label>
            <center><input name="ImageFile"  class="btn btn-primary ladda-button" data-style="zoom-in"  type="file"/></center>
        </div>        

		<div class="form-group">
		  	<label>URL</label>
		    <input class="form-control" id="url" name="url" placeholder="(Optional)">
		</div>
		
	</div>
	<div class="col-xs-12 col-sm-6" id="section2" >
		<br>
		<h4><span class="subtext">Location <span class="subtext"><i class="fa fa-chevron-circle-right"></span></h4><br>
		<div id="locationField" class="form-group">
			<label>City to buy from</label>
	      	<input name='citybuy' class="form-control" id="searchTextField" type="text" size="50" placeholder="E.g. London, England" autocomplete="on">
	    </div>
	    
	    <div id="locationField" class="form-group">
			<label>Transaction Location </label>
	      	 <input name="citytrans" class="form-control" id="searchTextField1" type="text" size="50" placeholder="E.g. Jakarta, Indonesia" autocomplete="on">
	    </div>
	
	</div>

	<div class="col-xs-12 col-sm-6" id="section3">
		<br>
		<h4>Transaction Price</h4><br>
		<table class="table borderless">
			<tr>
				<td style="vertical-align:middle;width:155px">
				
					<div class="hidden-xs">
						<label>Price you are willing to pay: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-html="true"></i></label>
					</div>
				</td>
				<td style="width:45px">
					<input class="form-control" id="itemName" name="paid" maxlength="50" placeholder="1.000.000">
				</td>
			</tr>

		</table>
		<br>
		<div class="submit">           
	        <center>
	            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Request</button>
	        </center>
	    </div>
		<br><br>
	</div>
	<div class="col-xs-12 col-sm-3"></div>
</form>
