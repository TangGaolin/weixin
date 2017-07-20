import axios from 'axios'

axios.defaults.headers.post['Content-Type'] = 'application/json'

export function fetch(options) {
    return new Promise((resolve, reject) => {
    const instance = axios.create({
      timeout: 5000 // 超时
    })
    instance(options)
        .then(response => {
            const res = response.data
            console.log(res.statusCode)
            resolve(res)
        })
        .catch(error => {
            console.log(error) // for debug
            reject(error)
        })
  });
}




