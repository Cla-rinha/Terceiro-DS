package com.example.mariaclarasqlite.datamodel;

public class UsuarioDataModel {
    public static final String TABELA = "Usuario";
    public static final String EMAIL = "email";
    public static final String SENHA = "senha";
    public static String queryCriarTabela = "";

    public static final String criarTabela(){
        queryCriarTabela += "CREATE TABLE IF NOT EXISTS" + TABELA + '(';
        queryCriarTabela += EMAIL + "TEXT,";
        queryCriarTabela += SENHA + "TEXT";
        queryCriarTabela += ")";

        return queryCriarTabela;
    }
}
