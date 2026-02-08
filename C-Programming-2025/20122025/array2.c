#include <stdio.h>

int main()
{
    // Declare a 2D array: 4 names, max 20 chars each
    char arrc[4][20] = {"Apple", "Ball", "Cat", "Dog"};
    
    for(int i = 0; i < 4; i++){
        printf("%s ", arrc[i]);
    }

    printf("\n");

    return 0;
}