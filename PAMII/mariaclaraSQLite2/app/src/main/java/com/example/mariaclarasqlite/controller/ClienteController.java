package com.example.mariaclarasqlite.controller;

import android.content.ContentValues;
import android.content.Context;
import com.example.mariaclarasqlite.api.AppUtil;
import com.example.mariaclarasqlite.datamodel.ClienteDataModel;
import com.example.mariaclarasqlite.datasource.AppDataBase;
import com.example.mariaclarasqlite.model.Cliente;

public class ClienteController extends AppDataBase implements iCRUD<Cliente> {
    ContentValues dados;
    public ClienteController(Context context) {
        super(context);
    }

    public boolean inserir(Cliente obj){
        dados = new ContentValues();
        dados.put(ClienteDataModel.NOME, obj.getNome());
        dados.put(ClienteDataModel.EMAIL, obj.getEmail());

        String tabela = ClienteDataModel.TABELA;
        return insert(tabela, dados);
    }

    @Override
    public boolean incluir(Cliente obj) {
        return false;
    }

    @Override
    public boolean alterar(Cliente obj) {
        return false;
    }

    @Override
    public boolean deletar(Cliente obj) {
        return false;
    }

    @Override
    public boolean listar(Cliente obj) {
        return false;
    }
}