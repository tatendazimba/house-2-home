export const BASE_URL = "/api/";

export const USER_ID = localStorage.getItem("userId") ? localStorage.getItem("userId") : null;
export const TOKEN = localStorage.getItem("token") ? localStorage.getItem("token") : null;
export const AVATAR = localStorage.getItem("avatar") ? localStorage.getItem("avatar") : null;
export const NAME = localStorage.getItem("name") ? localStorage.getItem("name") : null;
export const USERNAME = localStorage.getItem("username") ? localStorage.getItem("username") : null;

export const PAGE_SIZE = 5;

export const REDIRECT = "/register";

export const AUTHORIZATION = {
    "Authorization": "Bearer " + TOKEN
};

export const POLL_FREQUENCY = 30000;

export const handleErrors = function(error, $store) {
    // if (error.response) {
    //     if (error.response.status === 401) {
    //         window.location.href = REDIRECT;
    //     }
    // } else if (error.request) {
    //     $store.commit("setErrorTemplateStatus", true);
    //
    //     setTimeout(_ => {
    //         $store.commit("setErrorTemplateStatus", false);
    //     }, 5000);
    // } else {
    //     // console.log('Error', error.message);
    // }
};
