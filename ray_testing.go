package main

import (
	"encoding/json"
	"fmt"
	"github.com/octoper/go-ray"
	"log"
	"math/rand"
	"net/http"
	"strings"
	"time"
)

type Employee struct {
	FirstName   string
	LastName    string
	TotalLeaves int
	LeavesTaken int
}

func (e Employee) LeavesRemaining() {
	fmt.Printf("%s %s has %d leaves remaining\n", e.FirstName, e.LastName, e.TotalLeaves-e.LeavesTaken)
}

var seededRand *rand.Rand = rand.New(
	rand.NewSource(time.Now().UnixNano()))

const charset = "abcdefghijklmnopqrstuvwxyz"

// StringWithCharset returns a random string of length n drawn from charset.
// Code from https://stackoverflow.com/a/31832326
func StringWithCharset(length int, charset string) string {
	b := make([]byte, length)
	for i := range b {
		b[i] = charset[seededRand.Intn(len(charset))]
	}
	return string(b)
}

func RandomString(length int) string {
	return StringWithCharset(length, charset)
}

func main() {
	rand.Seed(time.Now().UnixNano())

	e := Employee{
		FirstName:   "Sam",
		LastName:    "Adolf",
		TotalLeaves: 30,
		LeavesTaken: 20,
	}

	// create 10 employees with random leaves taken, random first and last names
	var employees []Employee
	for i := 0; i < 10; i++ {
		employees = append(employees, Employee{
			FirstName:   strings.Title(RandomString(10)),
			LastName:    strings.Title(RandomString(10)),
			TotalLeaves: rand.Intn(33),
			LeavesTaken: rand.Intn(100),
		})
	}

	e.LeavesRemaining()
	//ray.Ray(employees[4])
	ray.Ray(GetRepos("alfredleo"))
}

// GetRepos write a function that takes a string as a username in GitHub.com and returns public repositories
// example: GetRepos("alfredleo") returns a slice of strings with the names of the user's public repositories
func GetRepos(username string) []string {
	url := fmt.Sprintf("https://api.github.com/users/%s/repos", username)
	resp, err := http.Get(url)
	if err != nil {
		log.Fatal(err)
	}
	defer resp.Body.Close()
	var repos []string
	// ray.Ray(resp.Body)
	if err := json.NewDecoder(resp.Body).Decode(&repos); err != nil {
		log.Fatal(err)
	}
	return repos
}
