<style>
.v3-emoji-picker{
    position: absolute;
    text-align: left;
    bottom: 100%;
    left: 2%;
}
.v3-emoji-picker .v3-footer{
    display: none;
}
.unread-badge{
    font-size: 11px;
    border-radius: 25px;
    padding: 3px 5px;
}
</style>
<template>
    <div class="chat-wrapper">
        <div class="chat-sidebar">
            <div class="chat-sidebar-header">
                <div class="d-flex align-items-center">
                    <div class="chat-user-online">
                        <img v-bind:src='user.chat_avatar' width="45" height="45" class="rounded-circle border" alt="" />
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <p class="mb-0">{{user.name}}</p>
                    </div>
                    <div class="dropdown">
                        <div class="cursor-pointer font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;">Settings</a>
                            <div class="dropdown-divider"></div>	
                            <a class="dropdown-item" href="javascript:;">Help & Feedback</a>
                        </div>
                    </div>
                </div>
                <div class="mb-3"></div>
                <div class="input-group input-group-sm"> <span class="input-group-text bg-transparent"><i class='bx bx-search'></i></span>
                    <input type="text" class="form-control" placeholder="People, groups, & messages"> <span class="input-group-text bg-transparent"><i class='bx bx-dialpad'></i></span>
                </div>
            </div>
            <div class="chat-sidebar-content">
                <div class="chat-list">
                    <div class="list-group list-group-flush">
                        <template v-for='contact in users'>
                            <a href="javascript:;" class="list-group-item" v-bind:class="(contact.id == chatUser.id) ? 'active' : '' " @click="fetchMessages(contact)">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img v-bind:src="contact.chat_avatar" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">{{ contact.name }}</h6>
                                        <p class="mb-0 chat-msg">{{ contact.email }}</p>
                                    </div>
                                    <span class="badge text-bg-danger unread-badge" v-if='contact.unread_messages_count > 0'>{{contact.unread_messages_count}}</span>
                                </div>
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none" id="chatBox">
            <div class="chat-header d-flex align-items-center">
                <div class="chat-toggle-btn"><i class='bx bx-menu-alt-left'></i></div>
                <div class="d-flex align-items-center">
                    <div class="chat-user-online me-3">
                        <img v-bind:src="chatUser.chat_avatar" width="50" height="50" class="rounded-circle border" alt="" />
                    </div>
                    <div>
                        <h4 class="mb-1 font-weight-bold">{{ chatUser.name }}</h4>
                        <div class="list-inline d-sm-flex mb-0 d-none"> 
                            <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><small class='bx bxs-circle me-1 chart-online'></small>Active Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-content" ref="hasScrolledToBottom">
                <div v-if='messages.length > 0'>
                    <template v-for='message in messages'>
                        <div class="chat-content-leftside" v-if="chatUser.id == message.sender_id">
                            <div class="d-flex">
                                <img v-bind:src="message.sender.chat_avatar" width="48" height="48" class="rounded-circle" alt="" />
                                <div class="flex-grow-1 ms-2">
                                    <p class="mb-0 chat-time">{{ message.sender.name }}, {{ message.created_at }}</p>
                                    <p class="chat-left-msg">{{ message.message }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="chat-content-rightside" v-else-if="user.id == message.sender_id">
                            <div class="d-flex ms-auto">
                                <div class="flex-grow-1 me-2">
                                    <p class="mb-0 chat-time text-end">you, {{ message.created_at }}</p>
                                    <p class="chat-right-msg">{{ message.message }}</p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="w-100 h-100 d-flex justify-content-center align-items-center" v-else>
                    <h5>Say Hi to <span style="font-weight: 600;">{{ chatUser.name }}</span> 👋</h5>
                </div>
            </div>
            <div class="chat-footer d-flex align-items-center">
                <div class="flex-grow-1 pe-2 position-relative">
                    <EmojiPicker :display-recent="true" :disableSkinTones="false" @select="onSelectEmoji" class="d-none" />
                    <div class="input-group">
                        <a href="javascript:;" @click="showEmoji"><span class="input-group-text"><i class='bx bx-smile'></i></span></a>
                        <input type="text" class="form-control" placeholder="Type a message" v-model="newMessage" @keyup.enter="addMessage">
                        <a href="javascript:;" id="btn-chat" @click="addMessage" class="rounded-0 ms-2"><span class="input-group-text px-4 bg-primary text-white rounded-0"><i class='bx bx-send'></i></span></a>
                    </div>
                </div>
            </div>
            <div class="overlay chat-toggle-btn-mobile"></div>
        </div>
    </div>
</template>

<script>
import { reactive, inject, ref, onMounted, onUpdated } from 'vue';
import axios from 'axios';
// import "bootstrap/dist/js/bootstrap.min.js";
import { Popover } from 'bootstrap/dist/js/bootstrap.esm.min.js'

export default {
    props: ['user'],
    setup(props) {
        let users = ref([])
        let chatUser = ref('')
        let messages = ref([])
        let newMessage = ref('')
        let hasScrolledToBottom = ref('')
        onMounted(() => {
            Array.from(document.querySelectorAll('button[data-bs-toggle="popover"],a[data-bs-toggle="popover"]'))
                .forEach(popoverNode => new Popover(popoverNode,{
                    trigger : 'focus body',
                }))
            fetchUsers()
        })
        onUpdated(() => {
            scrollBottom()
        })
        Echo.private('chat-channel')
            .listen('SendMessage', (e) => {
                messages.value.push(e.message);
                console.log(props.user,users.value,chatUser.value,e.message);
                if(e.message.sender_id != chatUser.value.id && e.message.receiver_id == props.user.id && e.message.read == 0){
                    let i = users.value.map(item => item.id).indexOf(e.message.sender_id) // find index of your object
                    users.value.splice(i, 1);
                    fetchUnread(e.message.sender_id);
                }
                console.log(users.value);
            })
        const fetchUsers = async () => {
            axios.get('/backpanel/chats/users').then(response => {
                users.value = response.data;
            });
        }
        const fetchUnread = async (user) => {
            axios.get('/backpanel/chats/user/fetch-unread/'+user).then(response => {
                users.value.unshift(response.data);
            });
        }
        const fetchMessages = async (selectedUser) => {
            document.querySelector('#chatBox').classList.remove('d-none');
            if(chatUser.value.id != selectedUser.id){
                chatUser.value = selectedUser;
                axios.get('/backpanel/chats/contact-messages/' + selectedUser.id).then(response => {
                    messages.value = response.data;
                });
            }
        }
        const onSelectEmoji = async (emoji) => {
            newMessage.value += emoji.i;
        }
        function showEmoji() {
            document.querySelector('.v3-emoji-picker').classList.toggle('d-none');
        }
        const addMessage = async () => {
            let user_message = {
                user: props.user.id,
                receiver : chatUser.value.id,
                message: newMessage.value
            };
            axios.post('/backpanel/chats/messages', user_message).then(response => {
                messages.value.push(response.data);
            });
            newMessage.value = ''
        }
        const scrollBottom = () => {
            if (messages.value.length > 1) {
                axios.get('/backpanel/chats/read/' + chatUser.value.id).then(response => {
                    if(document.querySelector('.selected-user > .unread-badge') != null){
                        document.querySelector('.selected-user > .unread-badge').remove();
                    }
                });
                let el = hasScrolledToBottom.value;
                el.scrollTop = el.scrollHeight;
            }
        }
        return {
            users,
            messages,
            chatUser,
            newMessage,
            fetchUnread,
            addMessage,
            fetchMessages,
            showEmoji,
            onSelectEmoji,
            hasScrolledToBottom
        }
    }
}
</script>