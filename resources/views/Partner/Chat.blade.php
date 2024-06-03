@extends('Partner.Master')
@section('css')
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"
        integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="/js/app.js"></script>
@endsection
@section('content')
    <div id="app">
        <div class="container-fluid">
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
                                        <button type="submit" class="close-popup p-3"><i
                                                class="ri-close-fill"></i></button>
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
                                    <button v-on:click="xoaTinNhan()" class="iq-bg-primary px-2"
                                        style="border: none; outline: none; border-radius: 10px;">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </div>
                            </header>
                        </div>
                        <div class="chat-content scroller" id="allChats">
                            <template v-for="(value,index) in allMessage">

                                <div class="chat" v-if="user_login == value.user_id">
                                    <div class="chat-user">
                                        <a class="avatar m-0">
                                            <img src="/assets_partner/images/user/1.jpg" alt="avatar" class="avatar-35 ">
                                        </a>
                                    </div>
                                    <div class="chat-detail">
                                        <div class="chat-message">
                                            <p>@{{ value.content }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat chat-left" v-else>
                                    <div class="chat-user">
                                        <a class="avatar m-0">
                                            <img src="/assets_partner/images/user/05.jpg" alt="avatar" class="avatar-35 ">
                                        </a>
                                    </div>
                                    <div class="chat-detail">
                                        <div class="chat-message">
                                            <p>@{{ value.content }}</p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="chat-footer p-3 bg-white">
                            <form class="d-flex align-items-center" action="javascript:void(0);">
                                <div class="chat-attagement d-flex">
                                    <a href="javascript:void();" id="emoji-btn"><i class="fa fa-smile-o pr-3"
                                            aria-hidden="true"></i></a>
                                    <a href="javascript:void();"><i class="fa fa-paperclip pr-3" aria-hidden="true"></i></a>
                                </div>
                                <input v-model="content" type="text" class="form-control mr-3"
                                    placeholder="Type your message" v-on:keyup.enter="guiTinNhan()">
                                <button id="sendMessage" type="button"
                                    class="btn btn-primary d-flex align-items-center p-2" v-on:click="guiTinNhan()">
                                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i><span
                                        class="d-none d-lg-block ml-1">Send</span>
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
        new Vue({
            el: '#app',
            data: {
                content: '',
                user_login: '',
                allMessage: [],
                amThanh: null,
            },
            created() {
                axios.get('/partner/chat/load-ver-1')
                    .then((res) => {
                        this.user_login = res.data.user;
                        this.allMessage = res.data.data;
                    });

                this.amThanh = new Audio('/chuong_chat.mp3');

                Echo.channel('chat').listen('newMessage', (res) => {
                    this.allMessage.push(res.chat);
                    this.amThanh.play();
                });

                Echo.channel('delete').listen('deleteMessage', (res) => {
                    if(res.deleteStatus){
                        this.allMessage = [];
                    }
                });
            },
            methods: {
                guiTinNhan() {
                    const payload = {
                        content: this.content
                    };
                    axios.post('/partner/chat/ver-1', payload)
                        .then((res) => {
                            if (res.data.status) {
                                this.allMessage.push(res.data.chat);
                                this.content = '';
                                this.$nextTick(() => {
                                    this.scrollBottom();
                                });
                            }
                        });
                },
                xoaTinNhan() {
                    axios.get('/partner/chat/delete')
                        .then((res) => {
                            if (res.data.data) {
                                toastr.success("Đã xóa tin nhắn thành công");
                                this.allMessage = [];
                            }
                        });
                },
                scrollBottom() {
                    $("#allChats").scrollTop($("#allChats")[0].scrollHeight);
                    setTimeout(() => {
                        $("#allChats").scrollTop(document.querySelector("#allChats").scrollHeight);
                    }, 50);
                }
            }
        });
    </script>
@endsection
