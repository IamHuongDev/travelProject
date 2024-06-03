@extends('Partner.Master')

@section('content')
    <div class="container-fluid">
        <input type="hidden" id="user_login" value="{{ Auth::guard('partner')->user()->id }}">
        <div class="row">
            <div class="col-lg-12 chat-data p-0 chat-data-right">
                <div class="tab-content">
                    <div class="chat-head">
                        <header class="d-flex justify-content-between align-items-center bg-white pt-3 pr-3 pb-3">
                            <div class="d-flex align-items-center">
                                <div id="sidebar-toggle" class="sidebar-toggle">
                                    <i class="ri-menu-3-line"></i>
                                </div>
                                <div class="avatar chat-user-profile m-0 mr-3 ml-3 ">
                                    <img src="/assets_partner/images/user/05.jpg" alt="avatar" class="avatar-50 "
                                        style="border-radius: 50%;">
                                    <span class="avatar-status"><i
                                            class="ri-checkbox-blank-circle-fill text-success"></i></span>
                                </div>
                                <h5 class="mb-0">Team Discussions</h5>
                            </div>
                            <div class="chat-user-detail-popup scroller">
                                <div class="user-profile text-center">
                                    <button type="submit" class="close-popup p-3"><i class="ri-close-fill"></i></button>
                                    <div class="user mb-4">
                                        <a class="avatar m-0">
                                            <img src="/assets_partner/images/user/05.jpg" alt="avatar"
                                                style="border-radius: 50%;">
                                        </a>
                                        <div class="user-name mt-4">
                                            <h4>Nik Jordan</h4>
                                        </div>
                                        <div class="user-desc">
                                            <p>Cape Town, RSA</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="chatuser-detail text-left mt-4">
                                        <div class="row">
                                            <div class="col-6 col-md-6 title">Nik Name:</div>
                                            <div class="col-6 col-md-6 text-right">Nik</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-md-6 title">Tel:</div>
                                            <div class="col-6 col-md-6 text-right">072 143 9920
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-md-6 title">Date Of Birth:</div>
                                            <div class="col-6 col-md-6 text-right">July 12, 1989
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-md-6 title">Gender:</div>
                                            <div class="col-6 col-md-6 text-right">Male</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-md-6 title">Language:</div>
                                            <div class="col-6 col-md-6 text-right">Engliah</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-header-icons d-flex">
                                <a href="javascript:void();" class="chat-icon-phone iq-bg-primary">
                                    <i class="ri-phone-line"></i>
                                </a>
                                <a href="javascript:void();" class="chat-icon-video iq-bg-primary">
                                    <i class="ri-vidicon-line"></i>
                                </a>
                                <a href="javascript:void();" class="chat-icon-delete iq-bg-primary">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                            </div>
                        </header>
                    </div>
                   <div id="divContent">
                    <div class="chat-content scroller" id="all_massage">

                    </div>
                   </div>
                   <div class="chat-footer p-3 bg-white">
                    <form class="d-flex align-items-center" action="javascript:void(0);">
                        <div class="chat-attagement d-flex">
                            <a href="javascript:void();" id="emoji-btn"><i class="fa fa-smile-o pr-3" aria-hidden="true"></i></a>
                            <a href="javascript:void();"><i class="fa fa-paperclip pr-3" aria-hidden="true"></i></a>
                        </div>
                        <input id="content" type="text" class="form-control mr-3" placeholder="Type your message">
                        <button id="sendMessage" type="button" class="btn btn-primary d-flex align-items-center p-2">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i><span class="d-none d-lg-block ml-1">Send</span>
                        </button>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {

            function loadTinNhan() {
                var user_login = $("#user_login").val();

                $.ajax({
                    url: '/partner/chat/load-ver-1',
                    type: 'get',
                    success: function(res) {
                        var html = '';
                        $.each(res.data, function(key, value) {
                            if (user_login == value.user_id) {
                                // tin nhắn bên phải
                                html += '<div class="chat"> \
                                        <div class="chat-user"> \
                                            <a class="avatar m-0"> \
                                                <img src="/assets_partner/images/user/1.jpg" alt="avatar" class="avatar-35 " style="border-radius: 50%;"> \
                                            </a> \
                                        </div> \
                                        <div class="chat-detail"> \
                                            <div class="chat-message"> \
                                                <p>' + value.content + '</p> \
                                            </div> \
                                        </div> \
                                    </div>';
                            } else {
                                // tin nhắn bên trái
                                html += '<div class="chat chat-left"> \
                                        <div class="chat-user"> \
                                            <a class="avatar m-0"> \
                                                <img src="/assets_partner/images/user/05.jpg" alt="avatar" class="avatar-35 " style="border-radius: 50%;"> \
                                            </a> \
                                        </div> \
                                        <div class="chat-detail"> \
                                            <div class="chat-message"> \
                                                <p>' + value.content + '</p> \
                                            </div> \
                                        </div> \
                                    </div>';
                            }
                        });
                        $("#all_massage").html(html);
                        scrollToBottom();
                    },
                });
            }

            function guiTinNhan() {
                var content = $("#content").val();
                var payload = {
                    'content': content,
                };

                $.ajax({
                    url: '/partner/chat/ver-1',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        if (res.status) {
                            $("#content").val('');
                            loadTinNhan();
                        }
                    },
                    error: function(err) {
                        var listError = err.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            }

            function scrollToBottom() {
                var chatContent = $('#all_massage');
                chatContent.scrollTop(chatContent[0].scrollHeight);
            }

            setInterval(function() {
                loadTinNhan();
                $("#divContent").scrollTop($("#divContent")[0].scrollHeight);
            }, 1000);
            loadTinNhan();

            $("#content").keyup(function(e) {
                if (e.key === "Enter") {
                    guiTinNhan();
                }
            });

            $("#sendMessage").click(function(e) {
                guiTinNhan();
            });
        });
    </script>
@endsection
