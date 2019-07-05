#Script para consumir API
#Linguagem utilizada : Python3
#Created by Jhonatas Rodrigues
#

import requests
import json
import os

# Request Area
# Menu Area
os.system('clear')
print("--> Bem vindo ao apipy 1.0 <--")
def menu(first=False):
        if not first:
            print("pressione qualquer tecla ...")
            input()
            os.system('clear')
        print( "(Menu)")
        print( ">> Use (1) Para Ver musica")
        print( ">> Use (2) Para Inserir musica")
        print( ">> Use (3) Para Atualizar musica")
        print( ">> Use (4) Para Deletar musica")
        print( ">> Use (0) Para Abortar :/")
        valor = input('Resposta :')
        if valor == '1':
            os.system('clear')
            print("loading...")
            data = requests.get('http://localhost:8000/api/musica')
            binary = data.content
            output = json.loads(binary)
            os.system('clear')
            x = 0
            print("-----musica{s} encontrado{s}-----\n".format(s='s' if len(output['data']) > 1 else ''))
            for item in output['data']:
                print('>> Id:',item['id'],'\n>> Nome: ', item['name'], '\n>> Gênero :', item['genero'], '\n>> artista :', item['artista'], '\n>> duracao :', item['duracao'])
                print("\n=====================================================================================================\n")
            menu()
        elif valor == '2' :
            os.system('clear')
            nome = input('Digite o nome da musica :')
            genero = input('Digite o gênero da musica :')
            artista = input('Digite o artista da musica :')
            duracao = input('Digite a duracao da musica :')
            requests.post('http://localhost:8000/api/musica', data = {'name':nome, 'genero': genero, 'artista':artista,'duracao':duracao})
            menu()
        elif valor == '4':
            os.system('clear')
            print(" >> Use (1) Deletar Apenas uma musica")
            print(" >> Use (2) Para Deletar Todas as musicas")
            print(" >> Use (0) Para Retornar ao Menu")
            resposta = input("Resposta :")
            if resposta == '1':
                musicaId = input('Digite o Id da musica:')
                requests.delete('http://localhost:8000/api/musica/' + musicaId)
            elif resposta == '2':
                requests.delete('http://localhost:8000/api/musica')
            else :
                menu()
        elif valor == '3':
            os.system('clear')
            identifier = input('Digite o ID da musica Que Você Deseja Alterar : ')
            nameN = input('Novo Nome : ')
            gen = input('Nova Gênero : ')
            artistaN = input('Novo artista: ')
            duracaoN = input('Nova duracao: ')
            requests.put('http://localhost:8000/api/musica/' + identifier , data = {'id': identifier, 'name':nameN, 'genero': gen, 'artista':artistaN,'duracao':duracaoN})
            menu()
        else :
            print("By by :)")
        #Percorrendo dados
menu(True)