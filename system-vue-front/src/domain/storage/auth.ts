import { defineStore } from 'pinia'

interface User {
    id: number
    name: string
}

interface AuthState {
    user: User | null
    token: string
}

export const useAuthStore = defineStore('auth', {
    state: (): AuthState => ({
        user: JSON.parse(localStorage.getItem('user') || '{}'),
        token: localStorage.getItem('token') || ''
    }),

    actions: {
        setUser(user: User) {
            localStorage.setItem('user', JSON.stringify(user))
            this.user = user
        },
        setToken(token: string) {
            localStorage.setItem('token', token)
            this.token = token
        },
        clearUser() {
            localStorage.removeItem('user')
            localStorage.removeItem('token')
            this.user = null
            this.token = ''
        }
    }
})
