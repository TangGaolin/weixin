import { fetch } from './fetch';


export function buyItem(params) {
    const data = params
    return fetch({
        url:  process.env.API_ROOT + '/activity/buyItem',
        method: 'post',
        data
    });
}




