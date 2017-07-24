import { fetch } from './fetch';

export function buyItem(params) {
    const data = params
    return fetch({
        url:  process.env.API_ROOT + '/userShare/buyItem',
        method: 'post',
        data
    });
}

export function getUserStatus(params) {
    const data = params
    return fetch({
        url:  process.env.API_ROOT + '/userShare/getUserStatus',
        method: 'post',
        data
    });
}

export function getOrderInfo(params) {
    const data = params
    return fetch({
        url:  process.env.API_ROOT + '/userShare/getOrderInfo',
        method: 'post',
        data
    });
}

export function jsSdkData(params) {
    const data = params
    return fetch({
        url:  process.env.API_ROOT + '/jsSdkData',
        method: 'post',
        data
    });
}
