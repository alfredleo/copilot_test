import random
import pygame

'''
Conway's Game of Life
'''
def game_of_life(board):
    '''
    board: list of lists
    '''
    # Create a copy of the board
    new_board = [[0 for i in range(len(board[0]))] for j in range(len(board))]
    # Iterate through the board
    for i in range(len(board)):
        for j in range(len(board[0])):
            # Count the number of live neighbors
            live_neighbors = 0
            for x in range(i-1, i+2):
                for y in range(j-1, j+2):
                    if x == i and y == j:
                        continue
                    if x < 0 or y < 0:
                        continue
                    if x >= len(board) or y >= len(board[0]):
                        continue
                    if board[x][y] == 1:
                        live_neighbors += 1
            # Set the new board
            if board[i][j] == 1:
                if live_neighbors < 2:
                    new_board[i][j] = 0
                elif live_neighbors > 3:
                    new_board[i][j] = 0
                else:
                    new_board[i][j] = 1
            else:
                if live_neighbors == 3:
                    new_board[i][j] = 1
                else:
                    new_board[i][j] = 0
    return new_board


if __name__ == '__main__':
    # random board of 0s and 1s size 77x77
    board = [[random.randint(0, 1) for i in range(77)] for j in range(77)]

    # visualize the game of life with pygame
    pygame.init()
    screen = pygame.display.set_mode((len(board[0])*10, len(board)*10))
    pygame.display.set_caption('Game of Life')
    clock = pygame.time.Clock()
    running = True
    while running:
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                running = False
        screen.fill((0, 0, 0))
        for i in range(len(board)):
            for j in range(len(board[0])):
                if board[i][j] == 1:
                    pygame.draw.rect(screen, (255, 255, 255), (j*10, i*10, 10, 10))
        pygame.display.flip()
        board = game_of_life(board)
        clock.tick(60)
    pygame.quit()