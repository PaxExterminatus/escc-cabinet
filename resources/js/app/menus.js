import api from 'api';

const memberHeaderMenu = [
    {
        label: 'Кабинет',
        icon: 'pi pi-home',
        to: '/'
    },
    {
        label: 'Платежи',
        icon: 'pi pi-money-bill',
        to: '/payments'
    },
    {
        label: 'Курсы',
        icon: 'pi pi-book',
        to: '/courses'
    },
    {
        label: 'Профиль',
        icon: 'pi pi-user-edit',
        to: '/profile'
    },
];

const memberUserMenu = [
    {
        label: 'Выйти',
        icon: 'pi pi-fw pi-power-off',
        command: () => {
            api.auth.logout();
        },
    },
];

export {
    memberHeaderMenu,
    memberUserMenu,
}
