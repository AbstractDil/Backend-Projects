#include <stdio.h>

// Right Half Pyramid Pattern

int main()
{
    
    int rows;
    
    printf("Enter number of rows: ");
    scanf("%d",&rows);
  

    // print pattern
    for (int i = 1; i <= rows; i++) 
    // outer loop for rows
    {
        for (int j = 1; j <= i; j++) 
        // inner loop for columns
        {
            printf("* ");
        }
        printf("\n");
    }

    return 0;
}
