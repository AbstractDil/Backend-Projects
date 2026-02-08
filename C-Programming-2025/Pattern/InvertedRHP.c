#include <stdio.h>

// Inverted Right Half Pyramid Pattern

int main()
{
    
    int rows;
    
    printf("Enter number of rows: ");
    scanf("%d",&rows);
  

    // print pattern
    for (int i = 1; i <= rows; i++) 
    // outer loop for rows
    {
        for (int j = 1; j <= rows - i + 1; j++)
        // inner loop for columns
        {
            printf("* ");
        }
        printf("\n");
    }

    return 0;
}

 /**
 * Example Output:
 * Enter number of rows: 5
 * + + + + +
 * + + + +
 * + + +
 * + +
 * +
 */