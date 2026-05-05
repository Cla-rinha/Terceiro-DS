package com.example.mariaclarasqlite.controller;

public interface iCRUD <T> {
    public boolean incluir(T obj);
    public boolean alterar(T obj);
    public boolean deletar(T obj);
    public boolean listar(T obj);
}
