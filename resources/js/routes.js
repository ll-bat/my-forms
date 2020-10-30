// import Home from './components/Home.vue';
import Responses from "./components/Responses";
import Response from "./components/Response";







export const routes = [
    { path: '/user/docs/responses', component: Responses, name: 'Responses' },
    { path: '/user/docs/responses/:id', component: Response, name: 'Response' },
];