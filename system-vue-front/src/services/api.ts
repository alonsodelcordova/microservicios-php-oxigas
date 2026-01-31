import axios from 'axios'

export const api = axios.create({
  baseURL: 'http://sistema/',
  timeout: 10000
})