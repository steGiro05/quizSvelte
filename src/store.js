import {  writable } from "svelte/store";

export const current_question = writable(0);

export const punteggio = writable(0);

export const user=writable(null)
