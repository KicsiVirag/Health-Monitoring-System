import { useUser } from "@stores/UserStore.mjs";

export function AuthGuard(to, from, next) {
    if (to.meta.requiresAuth) {
        if (useUser().isLoggedIn) {
            next()
        } else {
            next({name: 'log-in'})
        }
    } else {
        next()
    }
}
