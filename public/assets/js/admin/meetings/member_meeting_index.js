(()=>{"use strict";$(document).ready((function(){var a=$("#memberMeetingTable").DataTable({processing:!0,serverSide:!0,bStateSave:!0,order:[[0,"asc"]],ajax:{url:route("meetings.member_index"),data:function(a){a.filter_user=$("#filter_user").find("option:selected").val()}},columnDefs:[{targets:[1],className:"text-center",width:"20%"},{targets:[2,4,3],className:"text-center",width:"70px"},{targets:[5],orderable:!1,className:"text-center",width:"100px"}],columns:[{data:"topic",name:"topic"},{data:function(a){return moment(a.start_time).locale(currentLocale).format("Do MMM, YYYY hh:mm A")},name:"id"},{data:function(a){return"".concat(a.duration," minutes")},name:"duration"},{data:"status_text",name:"status"},{data:"password",name:"password"},{data:function(a){var t='<a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-video-camera"></i> Finished</a>';return 1==a.status&&(t='<a href="'.concat(a.meta.join_url,'" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-video-camera"></i> Join Meeting</a>')),t},name:"duration",searchable:!1}],drawCallback:function(){this.api().state.clear()},fnInitComplete:function(){$("#filter_user").change((function(){a.ajax.reload()}))}})}))})();