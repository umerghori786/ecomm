<script src="{{asset('dashboard/js/jquery1-3.4.1.min.js')}}"></script>

<script src="{{asset('dashboard/js/popper1.min.js')}}"></script>

<script src="{{asset('dashboard/js/bootstrap1.min.js')}}"></script>

<script src="{{asset('dashboard/js/metisMenu.js')}}"></script>

<script src="{{asset('dashboard/vendors/count_up/jquery.waypoints.min.js')}}"></script>

<script src="{{asset('dashboard/vendors/chartlist/Chart.min.js')}}"></script>

<script src="{{asset('dashboard/vendors/count_up/jquery.counterup.min.js')}}"></script>

<script src="{{asset('dashboard/vendors/swiper_slider/js/swiper.min.js')}}"></script>

<script src="{{asset('dashboard/vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>

<script src="{{asset('dashboard/vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('dashboard/vendors/gijgo/gijgo.min.js')}}"></script>

<script src="{{asset('dashboard/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/datatable/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('dashboard/vendors/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('dashboard/js/chart.min.js')}}"></script>

<script src="{{asset('dashboard/vendors/progressbar/jquery.barfiller.js')}}"></script>

<script src="{{asset('dashboard/vendors/tagsinput/tagsinput.js')}}"></script>

<script src="{{asset('dashboard/vendors/text_editor/summernote-bs4.js')}}"></script>
<script src="{{asset('dashboard/vendors/apex_chart/apexcharts.js')}}"></script>

<script src="{{asset('dashboard/js/custom.js')}}"></script>
<script src="{{asset('dashboard/vendors/apex_chart/bar_active_1.js')}}"></script>
<script src="{{asset('dashboard/vendors/apex_chart/apex_chart_list.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
	  $('#summernote').summernote();
	});
</script>
<script type="text/javascript">
  function confirmation(){
      if(confirm('are you sure?')){
          document.getElementById('delete-form').submit();
      }else{
          return false;
      }   
  }
</script>
<script type="text/javascript">
    $("#category_id").change(function(){
        var category_id = $(this).val();
        $.ajax({
            url : "{{url('user/showsub_category')}}",
            type : 'get',
            data : {category_id:category_id},

            success:function(data){
                var htmlData = '';
                $("#sub_category_id").empty();
                $("#sub_category_id").html('<option value="" disabled="true" selected="true">==Select Subcategory==</option>');
                for(i in data.sub_categories){

                    htmlData += '<option value="'+data.sub_categories[i].id+'">'+data.sub_categories[i].title+'</option>';
                }
                $("#sub_category_id").append(htmlData);
            }
        })
    })
</script>
